
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Sample Uji</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
                <ol class="breadcrumb pt-0">
                    <li class="breadcrumb-item">
                        <a href="?module=dashboard">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Data Sample Uji</a>
                    </li>   
                    
                </ol>
            </nav>
            <div class="separator mb-5"></div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <table class="data-table data-table-feature">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Sample</th>
                                <th>Nama Sample</th>
                                <th>Komoditi</th>
                                <th>Asal Sample</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $id = $_SESSION['id'];
                            $curl = curl_init();
                            $token = 'Authorization: Bearer '. $_SESSION['token'];
                            curl_setopt_array($curl, array(
                              CURLOPT_URL => 'https://bbpom-makassar.com/api/sample/'.$id,
                              CURLOPT_RETURNTRANSFER => true,
                              CURLOPT_ENCODING => '',
                              CURLOPT_MAXREDIRS => 10,
                              CURLOPT_TIMEOUT => 0,
                              CURLOPT_FOLLOWLOCATION => true,
                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                              CURLOPT_CUSTOMREQUEST => 'GET',
                              CURLOPT_HTTPHEADER => array(
                                $token
                              ),
                            ));

                            $response = curl_exec($curl);
                            $data = Json_decode($response);

                        
                                foreach ($data as $key=>$item ) {

                                    echo "<tr>";
                                    echo "<td>1</td>";
                                    echo "<td>$item->kode</td>";
                                    echo "<td>$item->nama_sample</td>";
                                    echo "<td>$item->komoditi</td>";
                                    echo "<td>$item->asal</td>";
                                    echo "<td><a href='?module=detail_sam&id=$item->kode' class='btn btn-info'>Detail</a></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>