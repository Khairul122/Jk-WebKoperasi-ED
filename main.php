<?php
$saldo = $koneksi->query("SELECT * FROM saldo WHERE id_saldo = 1")->fetch_assoc();
$total      = $saldo['total'];
$kas        = $saldo['kas'];
$terpakai   = $saldo['terpakai'];

?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="mr-4">
                                        <svg class="primary-icon" width="50" height="53" viewBox="0 0 50 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="7.11688" height="52.1905" rx="3" transform="matrix(-1 0 0 1 49.8184 0)" fill="#2130B8"></rect>
                                            <rect width="7.11688" height="37.9567" rx="3" transform="matrix(-1 0 0 1 35.585 14.2338)" fill="#2130B8"></rect>
                                            <rect width="7.11688" height="16.6061" rx="3" transform="matrix(-1 0 0 1 21.3516 35.5844)" fill="#2130B8"></rect>
                                            <rect width="8.0293" height="32.1172" rx="3" transform="matrix(-1 0 0 1 8.0293 20.0732)" fill="#2130B8"></rect>
                                        </svg>
                                    </span>
                                    <div class="media-body ml-1">
                                        <p class="mb-2">Jumlah Dana</p>
                                        <h5 class="mb-0 text-black font-w600"><?= formatRupiah($total) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="mr-4">
                                        <svg class="primary-icon" width="51" height="31" viewBox="0 0 51 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M49.3228 0.840214C50.7496 2.08096 50.9005 4.24349 49.6597 5.67035L34.6786 22.8987C32.284 25.6525 28.1505 26.0444 25.281 23.7898L18.1758 18.2072L5.77023 29.883C4.3933 31.1789 2.22651 31.1133 0.930578 29.7363C-0.365358 28.3594 -0.299697 26.1926 1.07723 24.8967L13.4828 13.2209C15.9494 10.8993 19.7428 10.7301 22.4063 12.8229L29.5115 18.4055L44.4926 1.1772C45.7334 -0.249661 47.8959 -0.400534 49.3228 0.840214Z" fill="#2130B8">
                                            </path>
                                        </svg>
                                    </span>
                                    <div class="media-body ml-1">
                                        <p class="mb-2">Terpakai</p>
                                        <h5 class="mb-0 text-black font-w600"><?= formatRupiah($terpakai) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <span class="mr-4">
                                        <svg class="primary-icon" width="50" height="53" viewBox="0 0 50 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="7.11688" height="52.1905" rx="3" transform="matrix(-1 0 0 1 49.8184 0)" fill="#2130B8"></rect>
                                            <rect width="7.11688" height="37.9567" rx="3" transform="matrix(-1 0 0 1 35.585 14.2338)" fill="#2130B8"></rect>
                                            <rect width="7.11688" height="16.6061" rx="3" transform="matrix(-1 0 0 1 21.3516 35.5844)" fill="#2130B8"></rect>
                                            <rect width="8.0293" height="32.1172" rx="3" transform="matrix(-1 0 0 1 8.0293 20.0732)" fill="#2130B8"></rect>
                                        </svg>
                                    </span>
                                    <div class="media-body ml-1">
                                        <p class="mb-2">Total Kas</p>
                                        <h5 class="mb-0 text-black font-w600"><?= formatRupiah($kas) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>