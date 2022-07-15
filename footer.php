<?php if($args['load_posts']): ?>
    <?php
        if(is_tag()) {
            $TAG_ID = get_queried_object()->term_id;
        } else {
            $TAG_ID = '';
        }

        if(is_category()) {
            $CAT_ID = get_queried_object()->term_id;
        } else {
            $CAT_ID = '';
        }

        $args = array(
            'numberposts' => -1,
            'cat' => $CAT_ID,
            'tag_id' => $TAG_ID
        );
        $POST_COUNT = count(get_posts($args));
    ?>

    <script>

        // for google ads
        var ins = document.createElement('ins');
        ins.className = 'adsbygoogle';
        ins.style = "display:block; width: 100%";
        ins.setAttribute("data-ad-client", "ca-pub-4670030831550253");
        ins.setAttribute("data-ad-slot", "9186630544");
        ins.setAttribute("data-ad-format", "auto");
        ins.setAttribute("data-full-width-responsive", "true");

        var TAG_ID = '<?php echo $TAG_ID; ?>';
        var CAT_ID = '<?php echo $CAT_ID; ?>';
        var POST_COUNT = <?php echo $POST_COUNT; ?>;
        var IS_EMPTY = (POST_COUNT < 8) ? true : false;
        var ON_LOADING = false;
        var POST_IDX = (POST_COUNT < 8) ? POST_COUNT-1 : 7;
        var POST_ARGS = {
            'cat_id': CAT_ID,
            'tag_id': TAG_ID
        };
        

        window.onscroll = async function(ev) {

            if ((window.innerHeight + window.scrollY + 10) >= document.body.offsetHeight) {
                // you're at the bottom of the page

                if(IS_EMPTY) {
                    // out of post in current category
                    let container = document.querySelector("body > div > div.sub-container > div.left");
                    if(container.lastElementChild.tagName == 'DIV' && container.lastElementChild.className == 'load-more') {
                        container.removeChild(container.lastElementChild);
                    }
                    let divEmt = document.createElement("div");
                    divEmt.className = 'load-more';
                    divEmt.innerHTML = '沒有更多文章囉！';
                    container.appendChild(divEmt);
                    return;
                }

                if(!ON_LOADING) {
                    // display 'loading...' and request new post 
                    await requestPost();
                    ON_LOADING = false;
                    
                }
            }
        };

        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function requestPost() {

            ON_LOADING = true;

            // asynchronous request new post
            var xhr = new XMLHttpRequest();
            POST_ARGS['offset'] = POST_IDX+1;
            console.log(POST_ARGS['offset']);
            xhr.open('POST', '/wp-content/themes/DataSci-Ocean-WP-Theme/utility/post.php', true);
            xhr.setRequestHeader("Content-type", "application/json");
            xhr.onreadystatechange = async function() { 
                if (xhr.readyState === 4 && xhr.status === 200) { 
                    await sleep(1000);
                    var res = xhr.responseText;
                    res = JSON.parse(res);

                    if(res.length < 8) {
                        IS_EMPTY = true;
                    } else {
                        POST_IDX += 8;
                    }

                    // remove load-more text
                    let container = document.querySelector("body > div > div.sub-container > div.left");
                    if(container.lastElementChild.tagName == 'DIV' && container.lastElementChild.className == 'load-more') {
                        container.removeChild(container.lastElementChild);
                    }

                    // google ads
                    let adEmt = document.createElement("div");
                    adEmt.className = 'ad-box';
                    let adInnerEmt = document.createElement("div");
                    adInnerEmt.style.backgroundColor = 'white';
                    adInnerEmt.style.opacity = '1.0';
                    adInnerEmt.appendChild(ins.cloneNode(true));
                    try {
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    } catch (err) {

                    }
                    adEmt.appendChild(adInnerEmt);
                    container.appendChild(adEmt);

                    // show all new articles
                    res.forEach(element => createNewGridItem(element));
                } 
            }
            xhr.send(JSON.stringify(POST_ARGS)); 

            // display 'load more ...' 
            let container = document.querySelector("body > div > div.sub-container > div.left");
            let divEmt = document.createElement("div");
            divEmt.className = 'load-more';
            divEmt.innerHTML = '載入中';
            container.appendChild(divEmt);

            for(let i=0; i<3; i++) {
                await sleep(300);
                divEmt.innerHTML += ' .';
            }
        }

        function htmlToElement(html) {
            var template = document.createElement('template');
            html = html.trim(); // Never return a text node of whitespace as the result
            template.innerHTML = html;
            return template.content.firstChild;
        }

        function createNewGridItem(element) {

            let html_string = `<article>
                    <div class="article-info">
                        <a href="${element['permalink']}">
                            <div class="text">
                                <div class="title">${element['title']}</div>
                                <div class="abstract">${element['abstract']}</div>
                            </div>
                        </a>
                        

                        <div class="meta-data">
                            <span class="date">${element['date']}</span><span class="estimation">．${element['estimation']} min read</span>．<span class="category"><a href="${element['catlink']}">${element['catname']}</a></span>
                        </div>
                    </div>

                    <a class="img-anchor" href="${element['permalink']}"><img src="${element['imgsrc']}" alt="article thumbnail"></a>
            </article>`

            let container = document.querySelector("body > div > div.sub-container > div.left");
            container.appendChild(htmlToElement(html_string));
        }
    </script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>