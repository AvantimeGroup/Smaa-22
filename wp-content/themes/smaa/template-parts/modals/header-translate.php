<div id="header-translate" class="collapse header-flyout">
    <div>
        <?php
            require_once dirname(__FILE__)."/languages.php";
        ?>
        <div class="container">
            <ul class="d-flex align-content-start flex-wrap">
                <?php
                foreach ($langs as $ix => $name) :
                ?>
                    <li><a class="nav-link lang-select" href="#googtrans(sv|<?php echo $ix; ?>)" data-lang="<?php echo $ix; ?>"><?php echo $name; ?></a></li>
                <?php
                endforeach;
                ?>
            </ul>
        </div>
        <script type="text/javascript">
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'sv', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
            }

            function triggerHtmlEvent(element, eventName) {
                var event;
                if (document.createEvent) {
                    event = document.createEvent('HTMLEvents');
                    event.initEvent(eventName, true, true);
                    element.dispatchEvent(event);
                } else {
                    event = document.createEventObject();
                    event.eventType = eventName;
                    element.fireEvent('on' + event.eventType, event);
                }
            }

            jQuery('.lang-select').click(function() {
            var theLang = jQuery(this).attr('data-lang');
            jQuery('.goog-te-combo').val(theLang);
            window.location = jQuery(this).attr('href');
            location.reload();

            });
        </script>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </div>
</div>