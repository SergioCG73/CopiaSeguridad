<?php 
echo "<link href='css/style_index.css' rel='stylesheet' type='text/css'/>";

echo "  
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th colspan='2'>P18</th>
                    <th colspan='2'>Sulfato</th>
                    <th colspan='2'>HCL</th>                    
                    <th colspan='2'>HB10</th>
                    <th colspan='2'>Sulfacid</th>                    
                    <th colspan='2'>Férrico</th>
                    <th colspan='2'>Sosa</th>
                    <th colspan='2'>Sulfúrico</th>
                    <th colspan='2'>Hipoclorito</th>
                </tr>

                <tr>
                    <th scope='col'>Fecha</th>
                    <th>Carga</th>                    
                    <th>Descarga</th>
                    <th>Carga</th>
                    <th>Descarga</th>
                    <th>Carga</th>
                    <th>Descarga</th>
                    <th>Carga</th>
                    <th>Descarga</th>
                    <th>Carga</th>
                    <th>Descarga</th>
                    <th>Carga</th>
                    <th>Descarga</th>
                    <th>Carga</th>
                    <th>Descarga</th>
                    <th>Carga</th>
                    <th>Descarga</th>
                    <th>Carga</th>
                    <th>Descarga</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th>$Fecha</th>
                    <td>$CargaP18</td>
                    <td>$DescargaP18</td>
                    <td>$CargaSulfato</td>
                    <td>$DescargaSulfato</td>
                    <td>$CargaHCL</td>
                    <td>$DescargaHCL</td>
                    <td>$CargaHB10</td>
                    <td>$DescargaHB10</td>
                    <td>$CargaS3</td>
                    <td>$DescargaS3</td>
                    <td>$CargaFerrico</td>
                    <td>$DescargaFerrico</td>
                    <td>$CargaSosa</td>
                    <td>$DescargaSosa</td>
                    <td>$CargaSulfurico</td>
                    <td>$DescargaSulfurico</td>
                    <td>$CargaHipo</td>
                    <td>$DescargaHipo</td>
                    <td><a href='formEditar.php?Fecha=$Fecha'><img src='../Images/lapiz_icon_color.png'r</a></td> 
                    <td><a onclick='return alertaBorrar();' href='../Actions/eliminar.php?id=$Fecha&producto=sulfacid'><img src='../Images/basura_icon_color.png'></a>
                </tr>            
            </tbody>
        </table>";
exit;
?>
