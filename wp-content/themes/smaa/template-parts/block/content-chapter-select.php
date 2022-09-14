
<?php 
/*

//  Block Chapter select
//  

*/
// Deliniates chaptersw for hide and show functions

 switch (get_field('select_chapter_type')) {
                    case "start":
                        echo'<div id="' . get_field('chapter_anchor_link') . '" class="chapter"><!-- start of the first chapter -->';
                        break;
                    case "middle":
                        echo'</div><!-- end of chapter --> <div id="'. get_field('chapter_anchor_link') .'" class="chapter"><!-- Anchor link for chapter -->';
                        break;
                    case "last":
                        echo'</div><!-- end of chapter -->';
                        break;
                    default:
                    echo'<!-- error missing chapter type -->';
            }
            
?>


        
