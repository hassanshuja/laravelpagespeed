    
    <link rel="stylesheet" href="<?php echo e(url('css/noooffer.css')); ?>">  
    
    <div class="container-fluid">
        <?php echo $__env->make('navoverview2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('navoverview3', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
        <?php echo $__env->make('navoverview4', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div class="container-fluid contDefCss">
        
        <div class="row MAINTITLE">
            <div class="col-12">
                <h1 class="noOfferTitle"><?php echo e($categoryName); ?> - <?php echo e($regionName); ?></h1>
            </div>
        </div>
        <div class="row MainInfosNOofer">
            <div class="col-12 subTitle">
                <h4>Herzlichen Dank für Ihren Besuch auf MeinWeekend.ch</h4>
            </div>
            <?php if($categoryName!=''): ?>
            <div class="col-12 col-md-6 firstPart">
                    <p>Sämtliche Angebote zu der Kategorie <?php echo e($categoryName); ?> finden Sie wie folgt:</p>
    
                    <?php
                        if(!isset($category_link) || (isset($category_link)&& ($category_link=='' || $category_link==null))){
                            $category_link='/';
                        }else{
                            $category_link='/'.$category_link;
                        }
                    ?>
                    
                    <a  href='<?php echo e(url($parent_category.$category_link)); ?>/'><button type="button" class="btn secondPartButt"> <?php echo e(strtoupper($categoryName)); ?></button></a>
                    
                    <?php if($categoryImage!=""): ?>
                        <div class="imgWraper">
                            <img class="img-fluid" src="<?php echo e(url('assets'.$categoryImage)); ?>" title="meinweekend" alt="meinweekend">
                        </div>
                    <?php endif; ?>
                    <p><br>Einfach Ihr Arrangement unter der Kategorie <?php echo e($categoryName); ?> buchen oder als Erlebnisgutschein bestellen. Jeder Erlebnisgutschein ist unter der Kategorie <?php echo e($categoryName); ?> per Post oder als Gutschein-Download erhältlich.</p>
                </div>

            <?php else: ?>

            <div class="col-12 col-md-6 firstPart"></div>
            <?php endif; ?>
           
            <?php if($regionName !=''): ?>
            <div class="col-12 col-md-6 secondPart">
                <p>Oder stöbern Sie einfach weiter in Ihrer bevorzugten Region <?php echo e($regionName); ?>:</p>
                
                
                <a  href="<?php echo e(url($parent_category.'/region/'.$region_link)); ?>/"><button type="button" class="btn secondPartButt"><?php echo e(strtoupper($parent_category)); ?> <?php echo e(strtoupper($regionName)); ?></button></a>
                <div class="imgWraper">
                    <img class="img-fluid" src="<?php echo e(url('assets'.$regionImage)); ?>" title="meinweekend" alt="meinweekend">
                </div>

                <p>Alle Arrangements Region <?php echo e($regionName); ?> direkt buchen oder als Erlebnisgutschein bestellen.</p>
            </div>
            <?php endif; ?>
        </div>

        <?php if($category_id==1 || $category_id==3): ?>
            <?php if($category_id==1): ?>
                <div class="row secondPartRow">
                    <div class="col-12 col-md-6 firstPart">
                        <div class="paragrafWarp">
                            <p><b>Ein Weekend als unvergessliches Erlebnis</b></p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Brauchen Sie ein Time Out, bietet Ihnen www.meinweekend.ch viele Ideen für ein Weekend in der Schweiz. Hier können Sie sich oder einem lieben Menschen mit einem Geschenkgutschein ein unvergessliches Weekend bescheren.</p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Unsere Angebote als Weekend Arrangements sind so umfang- wie facettenreich. Da gibt es zum Beispiel das Weekend mit Loveroom für verliebte Pärchen, die ein Romantik Weekend mit Wellness in der Schweiz verbringen möchten. Ein Loveroom Weekend ist außerdem eine hervorragende Geschenkidee und als Geschenkgutschein erhältlich.</p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Ein Wellness Weekend bieten wir am Bodensee, im Schwarzwald, im Berner Oberland und in der Innerschweiz an. Ein Wellness Weekend mit optimalem Preis-/Leistungsverhältnis in Ihrer Nähe. Special Lifestyle bieten auch unsere Lifestyle Weekend Angebote. Mit Freundinnen ein Wellness Weekend verbringen oder ein Lifestyle Weekend Package nach dem Motto „Sex and the City" erleben.</p>
                        </div>
                    </div>
                
                    <div class="col-12 col-md-6 secondPart">
                        <div class="paragrafWarp">
                            <p><b>&nbsp;</b></p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Aber auch die Abenteuerlustigen kommen mit einem Weekend Package oder einem Tagesausflug auf ihre Kosten. Selbstverständlich sind die Angebote auch für Gruppenausflüge geeignet. Wie wäre es zum Beispiel mit einem Esel- oder Ziegen Trekking? Oder doch lieber eine Huskytour? Entdecken Sie die schönsten Regionen der Schweiz wie das Tessin, Graubünden, Engadin oder das weltberühmte Berner Oberland. Ganz begehrt in diesen Regionen ist auch das Helikopter fliegen.</p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Wer es lieber gemütlich und Gaumenfreuden mag, sollte ein Weekend mit Genuss wählen. Erleben Sie neue Geschmacksnoten während einem Weinseminar oder Whiskey Tasting. Oder entdecken Sie die Vielfalt des Biers und brauen Sie Ihr eigenes Bier.</p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Lassen Sie sich von unseren Weekend Erlebnissen inspirieren. Unerwartete, spannende, genüssliche, romantische und actionreiche Weekend Aktivitäten erwarten Sie.</p>
                        </div>

                    </div>
                </div>
            <?php endif; ?>
            <?php if($category_id==3): ?>
                <div class="row secondPartRow">
                    <div class="col-12 col-md-6 firstPart">
                        <div class="paragrafWarp">
                            <p><b>Erlebnisreiche Gruppenausflüge und Teamevents perfekt geplant</b></p>
                        </div>
                        <div class="paragrafWarp">
                            <p>www.meinweekend.ch ist spezialisiert auf Gruppenausflüge, Firmenevents, Teamevents und Firmenausflüge. Spiel, Spass und Spannung stehen bei uns GROSS geschrieben.</p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Erlebnisreiche, ungewöhnliche und abenteuerliche Gruppenausflüge und Firmenausflüge sind unser tägliches Geschäft. Perfekt geplant und mit ausgesuchten verlässlichen Partnern haben wir bereits Gruppenausflüge für etliche namhafte Firmen geplant. Hierzu gehören die Schweizerische Mobiliar, Tchibo (Schweiz), Swisscom, Hoffmann-La-Roche und viele mehr.</p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Bei uns finden Sie auch tolle Ideen für Firmenevents oder Teamevents. Soll die Teambildung und Teamentwicklung im Vordergrund stehen, können wir gerne geeignete Firmenausflüge empfehlen.</p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Auf unserer Website finden Sie viele attraktive Angebote für Gruppenausflüge und Betriebsausflüge, die Sie nicht nur in die schönsten Regionen der Schweiz führen, sondern Ihnen auch ungewöhnliche und unvergessliche Erlebnisse bieten.</p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Gruppenausflüge  sind so vielfältig wie ihre Teilnehmer. Lassen Sie sich doch einfach beraten. Folgendes können wir Ihnen bieten:</p>
                        </div>
                        <div class="paragrafWarp">
                            <ul>
                                <li>Firmenausflüge als Teambildung oder Teamentwicklung für Firmen- oder Vereine</li>
                                <li>Betriebsausflüge als Rahmenprogramm einer Tagung</li>
                                <li>Gruppenausflüge als Schulausflug oder Gruppenausflüge für Familien und Freunde</li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="col-12 col-md-6 secondPart">
                        <div class="paragrafWarp">
                            <p><b>&nbsp;</b></p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Wir bieten fertige Arrangements oder individuelle und massgeschneiderte Gruppenausflüge für unterschiedliche Altersklassen und Interessensgruppen an. Sei es als Tagesausflug oder mit Übernachtung. Es bleiben keine Wünsche offen. Für spannende Gruppenausflüge und Firmenausflüge wie Rafting, Western Abenteuer, Trekking, Segelevents, oder für eine Quadtour sind Sie bei uns richtig.</p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Wer es lieber mit Genuss angehen möchte, dem bieten wir Gruppenausflüge und Firmenevents mit Degustation, einem Tasting Parcours oder einen Kochevent. Ihre Sinne sind immer aktiv mit dabei. Besonders gefragt sind unsere Gruppenausflüge mit Erlebnisparcours wie zum Beispiel das Weinseminar mit Schokoladen Tasting, bei denen Genuss und Spass den Ton angeben.</p>
                        </div>
                        <div class="paragrafWarp">
                            <p>Gerne erstellen wir Ihnen individuelle Pakete für Gruppenausflüge oder Firmenausflüge. Nehmen Sie mit uns Kontakt auf und wir organisieren Ihnen erlebnisreiche Tage ganz nach Ihrem Geschmack.</p>
                        </div>

                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>


    </div>