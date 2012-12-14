<?php
    $page_title = 'Asset';
    $page_script = 'asset.js';
    require_once('include/header.php');
?>
            <div class="row-fluid">
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
                    <h5><a href="#">Brand Networks, Inc</a> - <strong>Insights Dashboard V2</strong></h5>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span8 creative-image">
                    <img src="img/test-creative-1.jpg" style="width:100%" />
                </div>
                <div class="span4">
                    <div class="row-fluid control-panel">
                        <div class="span12">
                            <a href="#NewCommentForm"><button class="btn" type="button"><i class="icon-plus-sign"></i> Add Comment</button></a>
                            <button class="btn" type="button"><i class="icon-arrow-down"></i> Download</button>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span12 creative-info">
                            <h4>Information</h4>
                            <p><strong>Uploaded by </strong><a href="#">Jim DeWitt</a></p>
                            <p><strong>Created</strong> at 3:25PM on 12/11/2012</p>
                            <p><strong>Last Updated</strong> at 4:55PM on 12/13/2012</p>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span12 creative-comments">
                            <h4>Comments</h4>

                            <div class="comment">would like to see a little less orange here - maybe add some blue to the mix? <em><a href="#">Joseph Spens</a> 12/11/12 8:33am</em></div>

                            <div class="comment">herp a derp, a derp herp derp. derpy derp merp derp? kerpa derp merp derp. derp? erp ah derp ah der. <em><a href="#">Jim DeWitt</a> 12/12/12 9:33am</em></div>

                            <div class="comment last">can we make the calendar button larger? i think it needs to "pop" more <em><a href="#">Kyle Shay</a> 12/11/12 8:33am</em></div>



                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span12 add-comment">
                            <a name="NewCommentForm"></a>
                            <h4>Add New Comment</h4>
                            <form id="AddCommentForm">
                                <textarea name="NewComment" id="NewComment"></textarea>
                                <br />
                                <button class="btn" type="submit" name="Submit"><i class="icon-plus-sign"></i> Add Comment</button>
                            </form>
                        </div>
                    </div>

                </div>


            </div>
            
<?php require_once('include/footer.php'); ?>
