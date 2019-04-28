<body>

    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $land='CH';
        if($d->country=='Dutschland'){
            $land='DE';
        }else if($d->country=='Österreich'){
            $land='AT';
        }
    
    ?>
     <table>
            <tr>
                <td>
        Neue Buchungsanfrage:<a href="https://www.meinweekend.ch/meinweekendejknaskjdnaksjdnakjsdnasndajkd/pdf/<?php echo e($booking_id); ?>"> Buchungsbestätigung (PDF)</a>

        <p>&nbsp;</p>
       
        <a style='text-decoration:none;' href="https://www.meinweekend.ch/ausflug/<?php echo e($other_data['offer_url']); ?>"><p style='color:rgb(0,57,146); font-weight:400; font-size:16px;text-decoration:none'><?php echo e(strtoupper($d->o_title)); ?></p></a>
        <table>
            <tr>
                <td width="200px"> Ankunftsdatum:</td>
                <td><?php echo e($other_data['translated_date']); ?></td>
            </tr>
            <tr>
                <td width="200px"> Dauer: </td>
                <td> <?php echo e($d->day); ?> <?php echo e($d->day>1?"Tage":"Tag"); ?>, <?php echo e($d->night); ?> <?php echo e($d->night>1?"Nächte":"Nacht"); ?> <?php if($additional['insert']==1): ?> (+Zusatznacht) <?php endif; ?></td>
            </tr>
        </table>
      
      
         <br>
        <table class='pricestable' width="650px" style='width:650px'>
            <tr>
                <td style='border-bottom:1px solid #75aaff; color:#75aaff; font-weight:900' width="350px">Reservationfrage</td>
                <td style='border-bottom:1px solid #75aaff; color:#75aaff; font-weight:900' width="120px">Preis</td>
                <td style='border-bottom:1px solid #75aaff; color:#75aaff; font-weight:900' width="180px">Anzahl</td>
                <td style='border-bottom:1px solid #75aaff; color:#75aaff; font-weight:900' width="100px">Total Betrag</td>
            </tr>
            <?php $__currentLoopData = $allPrices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($p->o_title); ?> <br> <?php echo e($p->o_sub); ?></td>
                    <td><?php echo e($other_data['currency']); ?> <?php echo e($p->adult_price); ?></td>  
                    <td><?php echo e($p->priceValue); ?>

                        <?php if($p->priceValue>1): ?>
                            <?php if($other_data['person_type']=='Person'): ?>
                                Personen
                            <?php elseif($other_data['person_type']=='Pauschale' || $other_data['person_type']=='Pauschal'): ?>
                                Pauschalen
                            <?php else: ?> 
                                <?php echo e($other_data['person_type']); ?>

                            <?php endif; ?>
                        <?php else: ?>
                            <?php echo e($other_data['person_type']); ?>

                        <?php endif; ?>
                    </td>
                    <td><?php echo e($other_data['currency']); ?> <span style='float:right'><?php echo e($p->current_total); ?>.00</span></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $allAdditionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($a->title); ?></td>
                    <td><?php echo e($other_data['currency']); ?> <?php echo e($a->price); ?></td>
                    <td><?php echo e($a->additionalValue); ?>X</td>
                    <td><?php echo e($other_data['currency']); ?> <span style='float:right'><?php echo e($a->current_total); ?>.00</span></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr class='last_row'>
                <td style='border-top:1px solid #75aaff' colspan='2'></td>
                <td style='border-top:1px solid #75aaff'>Gesamtbetrag:</td>
                <td style='border-top:1px solid #75aaff'><?php echo e($other_data['currency']); ?> <span style='float:right'><?php echo e($other_data['total_price']); ?>.00</span></td>
            </tr>
            <tr>
                <td colspan='4'>&nbsp;</td>
            </tr>
            <tr>
                <td colspan='3'></td>
                <td><?php echo e($other_data['alternateCurrency']); ?> <span style='float:right'><?php echo e($other_data['total_converted']); ?>.00* </span><br> (*Richwert)</td>
            </tr>
        </table>
        
        <p style='color:rgb(0,57,146); font-weight:400; font-size:16px;'>KONTAKTANGABEN</p>
        <table >
            <tr>
                <th width="200px"></th>
                <th></th>
            </tr>
            <tr>
                <td>Anrede:</td>
                <td><?php echo e($d->gender==0?"Herr":"Frau"); ?></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><?php echo e($d->name); ?></td>
            </tr>
             <tr>
                <td>Firma:</td>
                <td><?php echo e($d->company); ?></td>
            </tr>
            <tr>
                <td>Adresse:</td>
                <td><?php echo e($d->address); ?></td>
            </tr>
            <tr>
                <td>PLZ/ORT:</td>
                <td><?php echo e($land); ?>-<?php echo e($d->zip); ?>   <?php echo e($d->city); ?></td>
            </tr>
           
            <tr>
                <td>Telefon:</td>
                <td><?php echo e($d->telephone); ?></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><?php echo e($d->email); ?>

  <?php if(isset($other_data['email_error'])): ?>
                    (Attention! Email is not valid, please contact with customer via phone.)
                    <?php endif; ?>
</td>
            </tr>
        </table>
        <br>
        <p style='color:rgb(0,57,146); font-weight:400; font-size:16px; line-height:5px;'><?php echo e(strtoupper('ZusÄtzliche Informationen')); ?></p>
        <table>
            <tr>
                <th width="200px"></th>
                <th></th>
            </tr>
            <tr>
                <td>Wünsche der Kundin:</td>
                <td><?php echo e($other_data['message'], "(n.d.)"); ?></td>
            </tr>
        </table>
       
        <br>
    
        <br>
        <?php if($d->creditcard_required==1): ?>
        <p style='color:rgb(0,57,146); font-weight:400; font-size:16px; line-height:5px;'><?php echo e(strtoupper('RESERVATIONSGARANTIE')); ?></p>
       
            <?php if($cc['no_cc']==1): ?>
                <p><b>Ich habe keine Kreditkarte. Bitte kontaktieren Sie mich</b></p><br>
            <?php else: ?>
            <table>
                <tr>
                    <th width="200px"></th>
                    <th></th>
                </tr>
                <tr>
                    <td>Kreditkartentyp:</td>
                    <td> <?php echo e($cc['cc_type']); ?></td>
                </tr>
                <tr>
                    <td>Kreditkartennumber:</td>
                    <td><?php echo e($cc['cc_number']); ?></td>
                </tr>
                <tr>
                    <td>Gültig: Monat/Jahr:</td>
                    <td><?php echo e($cc['cc_m_y']); ?></td>
                </tr>
                <tr>
                    <td>Karteninhaber:</td>
                    <td> <?php echo e($cc['cc_name']); ?></td>
                </tr>
            </table>
               
            <?php endif; ?>
        <?php endif; ?>
       
        <p style='color:rgb(0,57,146); font-weight:400; font-size:16px; line-height:5px;'><?php echo e(strtoupper('Gutschein')); ?></p>
        <table>
            <tr>
                <th width="200px"></th>
                <th></th>
            </tr>
            <tr>
                <td>Gutschein Code: </td>
                <td><?php echo e($d->vaucher_code, "(n.d.)"); ?></td>
            </tr>
            <tr>
                <td>Marketing Code:</td>
                <td><?php echo e($d->marketing_code, "(n.d.)"); ?></td>
            </tr>
            <tr>
                <td>Total Betrag: </td>
                <td> <?php echo e($d->vaucher_amount, "(n.d.)"); ?></td>
            </tr>
        
        </table>
    
        <br><br>
       <table>
            <tr>
                <td>Beste Grüsse</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td> Ihr Service-Team</td>
            </tr>
            <tr>
                <td>
                    Swiss Insider GmbH 
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td> Telefon:  	+41 (0)43 288 06 26</td>
            </tr>
            <tr>
                <td>  E-mail:  	info@meinweekend.ch</td>
            </tr>
            <tr>
                <td>   URL: <a href='www.meinweekend.ch'>www.meinweekend.ch</a></td>
            </tr>

       </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td></tr><table>
    </body>
    <style>
         .pricestable{
            font-size:15px;
        }
        table{
            border-collapse: collapse;
        }

        /* .last_row{
            border-bottom:1px solid #75aaff;
        } */
            .table-head{
                font-weight: 900;
                color:#75aaff;
            }
              
            .price_right{
                float:right;
            }
            body {
                font-family: Arial,Helvetica;
                line-height: 4px;
                font-size:15px;
            }
            table {
                /* width: 100%; */
                margin-top: 5px;
                font-size:15px;
                margin-bottom: 15px; 
                
                }
            .table tr td {
                
                padding: 0px;
            }
        
            .bill-orderlist tr{
                border:1 px solid rgb(0,57,146);
            }
            .bill-orderlist th{
                color:rgb(0,57,146);
                border-bottom:rgb(0,57,146);
            }
            .confCondWarp {
        
                padding: 20px 50px;
                margin-right: 50px;
                background-color: #d3d3d3;
            }
        
            .confCondWarp p {
        
                line-height: 24px;
                margin-bottom: 0px;
            }
        
            .noPaddingTB {
                padding-top: 0px !important;
                padding-bottom: 0!important;
                }
        
            .tablE1 td, .tablE2 td, .tablE3 td,.tablE5 td,.tablE6 td,.tablE7 td{
                border: 1px;
                color: black;
                }
        
            .tablE3 td{
        
                padding: 0;
                }
        
            .tablE3 p{
        
                color:black;
                font-size: 1rem;
                }
            .tablE4 tr th {
        
                color: #013a89;
                }
        
                .tablE4 tfoot tr td {
        
                color: #013a89;
                }
        
                .tablE4 tbody tr:first-child,.tablE4 tbody tr:last-child {
        
                border-bottom: 1px solid #013a89;
                }
        
                .tablE5 p, .tablE6 p{
        
                color: black;
                font-size: 16px;
                }
        
                .tablE5 p:nth-child(2) {
        
                margin-bottom: 20px;
                }
        
                .tablE5 p:nth-child(7) {
        
                margin-bottom: 20px;
                }
                .tablE5 h2{
        
                font-size: 16px;
                color: #013a89;
                }
        
                .tablE5 {
        
                margin-top: 40px;
                padding-top: 20px;
                }
        
                .tablE6 {
        
                margin-top: 40px;
                }
        
                .tablE6 p:nth-child(3) {
        
                margin-bottom: 20px;
                }
        
                .tablE6 p:nth-child(6) {
        
                margin-bottom: 20px;
                }
        
                .tablE6 p:nth-child(8) {
        
                margin-bottom: 20px;
                }
        
                .meinInfo1 {
        
                color: #013a89 !important;
                text-align: right;
        
                }
        
                .meinInfo2 {
        
                color: #666;
                text-align: right
                }
        
                .contactInfo {
        
                text-align: right;
                }
        
                .resCode b{
        
                font-size: 20px;
                color: #626262 !important;
        
                }
        
                .resCapt {
        
                color: #013a89;
                font-size: 22px;
                }
        
                .resTr1 td{
                color: #013a89;
                border-top:none;
                }
        
                .resTr1 td,.resTr2 td,.resTr3 td {
        
                border-color: #013a89;
                }
        
                .resTr3{ 
        
                color: #013a89;
                }
        
                .resBackG {
        
                background: #eeeeee;
                width: 50%;
        
                }
        
                .tablE4 {
        
                padding-top: 25px;
                padding-bottom: 15px;
                }
                
               
        </style>