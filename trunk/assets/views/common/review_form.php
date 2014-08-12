<div class="modal fade" id="reviewForm" tabindex="-1" role="dialog" aria-labelledby="reviewForm" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="/review/send" id="sendForm">
                    <input type="hidden" required name="productID" id="productID" value="<?php echo $product->productID; ?>">
                    <fieldset>
                        <legend class="text-left">Review Form</legend>
                        <div class="form-group">
                            <div class="col-md-6">
                                <?php
                                $user = $this->pixie->auth->user();
                                $readonly = !is_null($user) ? 'readonly' : '';
                                $name = !is_null($user) ? $user->username : '';
                                $email = !is_null($user) ? $user->email : '';
                                ?>
                                <input type="text" maxlength="100" required class="form-control" placeholder="Name" name="userName" id="userName" <?php echo $readonly; ?> value="<?php echo $name; ?>">
                            </div>
                            <div class="col-md-6">
                                <input type="email" maxlength="100" required class="form-control" placeholder="Email" name="userEmail" id="userEmail" <?php echo $readonly; ?> value="<?php echo $email; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-left">
                                <input name="starValue" id="starValue" type="number" class="rating" min=0 max=5 step=1
                                       data-size="xs" data-rtl="false">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea class="form-control" id="textReview" name="textReview"
                                          placeholder="Input your review here..." required maxlength="500"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <button type="submit" name="sendreview" id="sendreview"
                                        class="btn btn-primary btn-block">Send review
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>