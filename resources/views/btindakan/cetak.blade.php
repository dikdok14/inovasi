<body onload="window.print()">
   <center>
   Nama Pasien : {{$d->pasien->nama}}
   <div class="table-responsive">
       <table border="3">
           <thead>
               <tr>
                   <th>NAMA TINDAKAN</th>
                   <th>JUMLAH</th>
                   <th>HARGA</th>
                   <th>TOTAL</th>
               </tr>
           </thead>
           <?php 
           $total = 0;
           $tot_bayar = 0;
           ?>
           @foreach ($ce as $uu)
           <tbody>
               <tr>
                   <td>{{$uu->tindakan->nama}}</td>
                   <td>{{$uu->jumlah}}</td>
                   <td>{{$uu->harga}}</td>
                   <?php $total = $uu->harga * $uu->jumlah 
                   ?>
                   <th>{{$total}}</th>
               </tr>
               <?php
               $tot_bayar += $total
               ?>
           </tbody>
           @endforeach
           <tr>
               <td colspan="3">TOTAL BAYAR</td>
               <td>
                   {{$tot_bayar}}
               </td>
           </tr>
       </table>
   </div>
   </center>
   </body>
   