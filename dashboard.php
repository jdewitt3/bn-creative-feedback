<?php
    $page_title = "Dashboard";
    $page_script = "dashboard.js";

    require_once('include/header.php');
?>
            <div>
                <div class="span8">
                    <h1>BN.creative-feedback</h1>
                </div>
                <div class="span4 user-panel">
                    <h5>Welcome, Jim DeWitt</h5>
                    <button class="btn" type="button">Dashboard</button>
                    <button class="btn" type="button">Logout</button>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    <h5>My Assets</h5>
                </div>
            </div>

            <div class="row-fluid">

                <div class="span8 asset-list">
                    <ul>
                        <li>
                            <i class="icon-play"></i> <a href="#">Insights Dashboard V2</a>
                        </li>
                        <li>
                            <i class="icon-play"></i> <a href="#">Macy's Carousel V3</a>
                        </li>
                        <li>
                            <i class="icon-play"></i> <a href="#">MLW Black Friday 2012 V2</a>
                        </li>
                    </ul>
                </div>
                <div class="span4">
                    
                    <div class="row-fluid">
                        <div class="span12 recent-activity">
                            <h5>Recent Activity</h5>
                            <div class="recent-item">
                                <i class="icon-envelope"></i> Kyle Shay commented on <a href="#">Insights Dashboard V2</a>
                            </div>
                            <div class="recent-item">
                                <i class="icon-envelope"></i> Joseph Spens commented on <a href="#">Insights Dashboard V2</a>
                            </div>
                            <div class="recent-item">
                                <i class="icon-plus"></i> Sam Chambers uploaded <a href="#">Insights Dashboard V2</a>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span12 recent-assets">
                            <h5>Recent Assets</h5>
                            <div class="recent-item">
                                <i class="icon-play"></i> <a href="#">Insights Dashboard V2</a>
                            </div>

                        </div>
                    </div>

                </div>


            </div>

        </div>
<?php require_once('include/footer.php'); ?>
