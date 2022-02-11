<?php
    /* Template Name: 首頁*/
    get_header();
?>

<div class="post-container">

    <div class="left-sidebar">
        LEFT SIDEBAR
    </div>

    <div class="middle-content">
        <?php while ( have_posts() ) : the_post(); ?>
            
            <section class="current-post">
                <?php the_title( '<h1>', '</h1>' ); ?>

                <div class="post-meta">
                    <div class="left">
                        <span class="post-date"><?php echo the_date('M j'); ?> · </span><span class="estimated-time"><?php echo get_field('estimated_time'); ?> min</span>
                    </div>

                    <div class="right">
                        
                    </div>
                </div>

                <?php the_content(); ?>

                <div class="input-container">
                    <input type="text" name="username" id="input-username" placeholder="Matters Username">
                    <button onclick="buttonClicked('like')">誰是粉絲</button>
                </div>

                <div class="canvas-container">
                    <canvas id="most-like-chart"></canvas>
                </div>

                <div class="post-tag">

                    <?php $tag_arr = get_the_tags(); ?>
                    
                    <ul>
                        <?php foreach($tag_arr as $tag): ?>
                            <li class="tag"><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    
                </div>
            </section>

            <!-- 
            <div class="box-divider"></div>

            <section class="more-post">
                MORE POST
            </section>

            <div class="box-divider"></div>
            -->
            <section class="discussion">
                <div id="disqus_thread"></div>
            </section>
           

        <?php endwhile; ?>
    </div>

    <div class="right-sidebar">
        RIGHT SIDEBAR
    </div>
</div>

<?php
    get_footer();
?>

<style>

    div.post-container {
        /*background-color: cornsilk;*/
        padding: 16vh 30px;

        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
    }

        div.left-sidebar {
            background-color: darkgray;
            width: 20%;
            height: 75vh;

            position: -webkit-sticky;
            position: sticky;
            top: 16vh;

            display: none;
            flex-direction: column;

        }

        div.right-sidebar {
            background-color:darkkhaki;
            width: 20%;
            height: 75vh;

            position: -webkit-sticky;
            position: sticky;
            top: 16vh;

            display: none;
            flex-direction: column;
        }

        div.middle-content {
            /*background-color: darksalmon;*/
            width: 700px;
        }

            div.middle-content section.current-post {
                background-color: white;
            }

                div.middle-content section.current-post div.post-meta {
                    /*background-color: aqua;*/
                    width: 100%;

                    display: flex;
                    flex-direction: row;
                    justify-content: flex-start;
                    align-items: flex-start;
                }

                    div.middle-content section.current-post div.post-meta div.left {
                        /*background-color: blanchedalmond;*/
                        width: 70%;
                    }
                        div.middle-content section.current-post div.post-meta div.left span {
                            color: #757575;
                            opacity: 0.6;
                            font-size: 1.05rem;
                        }

                    div.middle-content section.current-post div .post-meta div.right {
                        /*background-color:chartreuse;*/
                        width: 30%;
                    }
                
                div.middle-content section.current-post div.post-tag {
                    width: 100%;
                    /*background-color: chocolate;*/
                    margin-top: 7vh;
                }

                    div.middle-content section.current-post div.post-tag ul {
                        margin: 0;
                        padding: 0;
                        list-style-type: none;

                        display: flex;
                        flex-direction: row;
                        justify-content: flex-start;
                        align-items: flex-start;
                        flex-wrap: wrap;
                    }

                        div.middle-content section.current-post div.post-tag ul li.tag {
                            font-size: 0.85rem;
                            
                            background-color: rgba(209, 203, 203, 0.3);

                            margin-right: 15px;
                            padding: 0px 15px;
                            border-radius: 3px;

                            margin-bottom: 15px;
                        }

                            div.middle-content section.current-post div.post-tag ul li.tag a {
                                text-decoration: none;
                                color: #757575;
                                border-width: 0px;
                            }


                div.middle-content section.current-post h1 {
                    font-size: 2rem;
                    letter-spacing: 2px;
                }

                div.middle-content section.current-post h2 {
                    font-size: 1.5rem;
                    letter-spacing: 1px;
                    margin-block-start: 3rem;
                    margin-block-end: 0.6rem;
                }

                div.middle-content section.current-post p, 
                div.middle-content section.current-post li {
                    font-size: 1.16rem;
                    font-weight: 300;
                    letter-spacing: 0.5px;
                    line-height: 2.2rem;
                }
                    div.middle-content section.current-post p strong, 
                    div.middle-content section.current-post li strong {
                        font-weight: 500;
                    }

                    div.middle-content section.current-post p a, 
                    div.middle-content section.current-post li a {
                        text-decoration: none;
                        color: black;

                        border-bottom-style: solid;
                        border-bottom-color: black;
                        border-bottom-width: 2px;
                    }
                
                div.middle-content section.current-post pre {
                    background-color: rgba(242, 242, 242, 1);
                    color: rgba(0, 0, 0, 0.753);
                    font-size: 1.1rem;
                    font-weight: 300;

                    box-sizing: border-box;
                    padding: 2vh 5%;
                    margin: 4vh 0;

                    overflow-x: scroll;
                }

                div.middle-content section.current-post pre::-webkit-scrollbar {
                    display: none;
                }

                div.middle-content section.current-post div.wp-caption.aligncenter {
                    width: 100% !important;
                    margin: 3.5vh 0 5vh;
                }

                    div.middle-content section.current-post div.wp-caption.aligncenter img {
                        width: 100%;
                        height: auto;
                    }

                    div.middle-content section.current-post div.wp-caption.aligncenter p {
                        color: #757575;
                        opacity: 0.6;

                        font-size: 0.9rem;
                        text-align: center;

                        margin: 0;
                    }

                div.middle-content section.current-post div.canvas-container {
                    width: 100% !important;
                    margin: 3.5vh 0 5vh;
                }

                div.input-container {
                    width: 100% !important;
                    margin: 3.5vh 0 5vh;
                }

                    div.input-container input {
                        height: 5vh;
                        width: 60%;
                        font-size: 0.9rem;
                        font-family: 'Noto Sans TC', sans-serif;
                        box-sizing: border-box;
                        padding: 10px 20px;
                        border-radius: 8px;
                        border-color: gray;
                        border-width: 1px;
                        margin-right: 12%;
                    }

                    div.input-container button {
                        height: 5vh;
                        width: 20%;
                        font-size: 0.9rem;
                        font-family: 'Noto Sans TC', sans-serif;
                        box-sizing: border-box;
                        padding: 5px 20px;
                        border-radius: 8px;
                        border-color: gray;
                        border-width: 1px;
                        cursor: pointer;
                    }


            
            section.discussion {
                margin-top: 7vh;
                background: white;
            }

                section.discussion div#disqus_thread {
                    width: 100%;
                }



@media screen and (max-width: 720px) {
    div.middle-content section.current-post h1 {
        font-size: 1.9rem;
    }

    div.middle-content section.current-post div.post-meta div.left span {
        font-size: 1rem;
    }

    div.middle-content section.current-post h2 {
        font-size: 1.4rem;
    }

    div.middle-content section.current-post p, 
    div.middle-content section.current-post li {
        font-size: 1.06rem;
    }

    div.middle-content section.current-post div.wp-caption.aligncenter p {
        font-size: 0.85rem;
    }

    div.middle-content section.current-post pre {
        font-size: 1.0rem;
    }

    div.input-container input {
        margin-right: 10%;
    }

    div.input-container button {
        width: 22%;
        padding: 5px 5px;

    }
}

@media screen and (max-width: 500px) {
    div.middle-content section.current-post h1 {
        letter-spacing: 0px;
    }

    div.middle-content section.current-post h2 {
        letter-spacing: 0px;
    }

    div.middle-content section.current-post p, 
    div.middle-content section.current-post li {
        line-height: 29px;
    }

    div.middle-content section.current-post pre {
        font-size: 1.06rem;
        max-width: 85vw;
    }

    div.input-container input {
        margin-right: 5%;
    }

    div.input-container button {
        width: 25%;
        padding: 5px 3px;

    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    window.onload = function singlePostLoaded() {

        // load DISQUS
        setTimeout(function loadDisqus() {
            var disqus_config = function () {
                this.page.url = "<?php echo get_permalink(); ?>";  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = "<?php echo get_the_ID(); ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };

            (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = 'https://datasci-ocean.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        }, 3500);
    }
</script>

<script>

    var allArticlesHash;
    var username_input;

    // find my big fans on matters and display as chart
    var defaultData = {
        labels: [],
        datasets: [{
        label: '粉絲',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [],
        }]
    };

    var config1 = {
        type: 'bar',
        data: defaultData,
        options: {}
    };

    var chart1 = new Chart(
        document.getElementById('most-like-chart'),
        config1
    );

    function buttonClicked(flag) {

        if(flag == 'like') {

            allArticlesHash = [];
            username_input = document.querySelector('#input-username').value;
            
            var options = {
                "method": "post",
                "headers": {
                "Content-Type": "application/json"  
                },
                "body": JSON.stringify({
                    "query": prepareQuery1(username_input, '')
                }),
            };

            fetch('https://server.matters.news/graphql/', options)
                .then(res => res.json())
                .then(parseResult)
                .then(fetchAllArticleAppreciate)
                .then(drawChart1);
        }

    }

    function drawChart1(fans) {
        let items = fans.slice(0, 5);
        let labels = [];
        let values = [];

        items.forEach(function(item) {
            labels.push(item[0]);
            values.push(item[1]);
        });

        // update chart1
        chart1.data.labels = labels;
        chart1.data.datasets[0].data = values;
        chart1.update();
    }

    function prepareQuery1(username, after) {
        let query = `
            query {
                user(
                    input: {
                    userName: "${username}"
                    }
                ) {
                    displayName
                    articles(
                    input: {
                        after: "${after}"
                    }
                    ) {
                    totalCount
                    edges {
                        cursor
                        node {
                        title
                        mediaHash
                        }
                    }
                    }
                }
            }
        `;

        return query;
    }


    function extractResult(res) {

        if(res['totalCount'] == 0) {
            console.log("This user doesn't have any article.");
            return [];
        }

        let arr = [];
        res['edges'].forEach(function(edge) {
            arr.push(edge['node']['mediaHash']);
        });
        return arr;
    }

    async function parseResult(res) {

        if(res['data']['user'] == null) {
            console.log('Invalid Username !')
            return;
        }

        allArticlesHash = [];
        allArticlesHash = allArticlesHash.concat(extractResult(res['data']['user']['articles']));

        let originLength = allArticlesHash.length;
        let lastEdge = res['data']['user']['articles']['edges'].at(-1);
        while(true) {
            let after = lastEdge['cursor'];
            options = {
                "method": "post",
                "headers": {
                "Content-Type": "application/json"  
                },
                "body": JSON.stringify({
                    "query": prepareQuery1(username_input, after)
                }),
            };

            let res = await fetch('https://server.matters.news/graphql/', options);
            res = await res.json();
            allArticlesHash = allArticlesHash.concat(extractResult(res['data']['user']['articles']));

            if(allArticlesHash.length == originLength) {
                break;
            } else {
                originLength = allArticlesHash.length;
            }
        }
    }

    function prepareQuery2(mediaHash, after) {
        let query = `
            query {
                article(
                    input: {
                        mediaHash: "${mediaHash}"
                    }
                ) {
                    id
                    title
                    appreciationsReceivedTotal
                    appreciationsReceived(
                        input: {
                            after: "${after}"
                        }
                    ) {
                        totalCount
                        edges {
                            cursor
                            node {
                                amount
                                sender {
                                    likerId
                                    displayName
                                    userName
                                }
                            }
                        }
                    }
                }
            }
        `;

        return query;
    }

    async function fetchEachArticleAppreciateHepler(obj, mediaHash, after) {
        options = {
            "method": "post",
            "headers": {
            "Content-Type": "application/json"  
            },
            "body": JSON.stringify({
                "query": prepareQuery2(mediaHash, after)
            }),
        };

        let res = await fetch('https://server.matters.news/graphql/', options);
        res = await res.json();
        edges = res['data']['article']['appreciationsReceived']['edges'];
        
        if(edges.length == 0){
            return '';
        }

        edges.forEach(function (edge) {
            let sender = edge['node']['sender']['displayName'];
            let amount = edge['node']['amount'];

            if(sender in obj) {
                obj[sender] += amount;
            } else {
                obj[sender] = amount;
            }
        });

        let lastEdge = edges.at(-1);
        return lastEdge['cursor'];
    }

    async function fetchEachArticleAppreciate(obj, mediaHash, after) {
        let cursor = after;

        while(true) {
            cursor = await fetchEachArticleAppreciateHepler(obj, mediaHash, cursor);
            if(cursor == '') {
                break;
            }
        }
    }

    async function fetchAllArticleAppreciate() {
        console.log(`Total Article Number: ${allArticlesHash.length}`);

        let appreciateCount = {};

        for(let idx=0; idx<allArticlesHash.length; idx++) {
            console.log(`Extract No.${idx} Article`);
            await fetchEachArticleAppreciate(appreciateCount, allArticlesHash[idx], '');
        }

        console.log('Get appreciate info of each article.');

        // sort
        let items = Object.keys(appreciateCount).map(function(key) {
            return [key, appreciateCount[key]];
        });
        items.sort(function(first, second) {
            return second[1] - first[1];
        });

        return items;
    }
</script>