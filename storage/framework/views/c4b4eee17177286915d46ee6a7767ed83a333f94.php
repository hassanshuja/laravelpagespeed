
<table>
        <tbody>
        <tr>
        <td valign="top"><strong>Anrede</strong></td>
        <td><?php echo e($request->andrede==0?"Herr":"Frau"); ?></td>
        </tr>
        <tr>
        <td valign="top"><strong>Vorname</strong></td>
        <td><?php echo e($request->name); ?></td>
        </tr>
        <tr>
        <td valign="top"><strong>Name</strong></td>
        <td><?php echo e($request->vorname); ?></td>
        </tr>
        <tr>
        <td valign="top"><strong>Strasse</strong></td>
        <td><a href="https://maps.google.com/?q=Kreuzwiesenstrasse+4&amp;entry=gmail&amp;source=g"><?php echo e($request->strasse); ?></a></td>
        </tr>
        <tr>
        <td valign="top"><strong>PLZ</strong></td>
        <td><?php echo e($request->ort); ?></td>
        </tr>
        <tr>
        <td valign="top"><strong>Ort</strong></td>
        <td><?php echo e($request->plz); ?></td>
        </tr>
        <tr>
        <td valign="top"><strong>Telefon</strong></td>
        <td><?php echo e($request->telefon); ?></td>
        </tr>
        <tr>
        <td valign="top"><strong>Firma: </strong></td>
        <td><?php echo e($request->company); ?></td>
        </tr>
        <tr>
        <td valign="top"><strong>E-Mail</strong></td>
        <td><a href="mailto:<?php echo e($request->email); ?>" target="_blank"><?php echo e($request->email); ?></a></td>
        </tr>
        <tr>
        <td valign="top"><strong>Gewünschtes Erlebnis</strong></td>
        <td><?php echo e($request->offer); ?></td>
        </tr>
        <tr>
        <td valign="top"><strong>Mein Anliegen</strong></td>
        <td><?php echo e($request->message); ?></td>
        </tr>
        </tbody>
        </table><div class="yj6qo"></div><div class="adL">
        </div>