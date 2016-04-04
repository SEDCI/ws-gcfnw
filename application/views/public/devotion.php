    <section id="devotion" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Weekly Message</h2>
                </div>
            </div>
            <div class="row">
        		<h4 class="verse">"<?php echo $message['content']; ?>"</h4>
                <h4 style="float: right; color: #A7A7A7;"><?php echo $message['verse']; ?></h4>
            </div>
<?php if ($this->session->userdata('memberuser') && !empty($message)): ?>
            <br />
            <div class="row">
                <div class="col-sm-12 text-center wm-download-links">
                    <?php if (!empty($message['ppt_file'])) : ?><a class="btn btn-lg btn-danger" title="Download Powerpoint Presentation" href="<?php echo base_url('files/weeklymessage/'.$message['ppt_file']); ?>" target="_blank"><div><span class="glyphicon glyphicon-download-alt"></span> Download Powerpoint File</div></a><?php endif; ?>
                    <?php if (!empty($message['ios_file'])) : ?><a class="btn btn-lg btn-danger" title="Download Presentation For iOS" href="<?php echo base_url('files/weeklymessage/'.$message['ios_file']); ?>" target="_blank"><div><span class="glyphicon glyphicon-download-alt"></span> Download For iOS</div></a><?php endif; ?>
                    <?php if (!empty($message['pdf_file'])) : ?><a class="btn btn-lg btn-danger" title="Download PDF" href="<?php echo base_url('files/weeklymessage/'.$message['pdf_file']); ?>" target="_blank"><div><span class="glyphicon glyphicon-download-alt"></span> Download PDF File</div></a><?php endif; ?>
                    <?php if (!empty($message['doc_file'])) : ?><a class="btn btn-lg btn-danger" title="Download Word File" href="<?php echo base_url('files/weeklymessage/'.$message['doc_file']); ?>" target="_blank"><div><span class="glyphicon glyphicon-download-alt"></span> Download Word File</div></a><?php endif; ?>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 wm-comments">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>Comments</h4>
                        </div>
                    </div>
                    <div class="row">
                        <hr />
                    </div>
<?php
if (!empty($comments)):
foreach($comments as $comment):
?>
                    <div class="wm-comment">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="commentor">
                                    <?php echo $comment['first_name'].' '.$comment['last_name']; ?> <span class="comment-date">(<?php echo date('F j, Y H:i A', strtotime($comment['date_commented'])); ?>)</span>
                                    <!--<a class="pull-right" href="#" title="Delete Comment"><span class="glyphicon glyphicon-remove"></span></a>-->
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><?php echo $comment['comment']; ?></p>
                            </div>
                        </div>
                    </div>
<?php
endforeach;
else:
?>
                    <div class="wm-comment">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="commentor">No comments.</p>
                            </div>
                        </div>
                    </div>
<?php endif; ?>
                    <div class="row">
                        <hr />
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h6>Post a Comment</h6>
<?php echo form_open('devotion/comment/post'); ?>
                                <div class="form-group">
                                    <p><textarea class="form-control" id="comment" name="comment" maxlength="500"></textarea></p>
                                    <p class="pull-right"><button type="submit" class="btn btn-primary">Post</button></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php endif; ?>
        </div>
    </section>
