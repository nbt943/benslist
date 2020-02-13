<div class="modal fade" id="review_modal">
                  <div class="modal-dialog modal-xl">
                     <div class="modal-content">                     
                       <!-- Modal Header -->
                        <div class="modal-header">
                           <h4 class="modal-title"><b> Write A Review</b></h4>
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                       
                       <!-- Modal body -->
                        <div class="modal-body">
                           <div class="form-group" id="rating-ability-wrapper">
                              <!-- <label class="control-label" for="rating">  -->
                              <!-- <span class="field-label-info"></span> -->
                              <!-- </label> -->
                              <h2 class="bold rating-header" style="">
                              <span class="selected-rating">0</span><small> / 5</small>
                              </h2>
                              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </button>
                              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </button>
                              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </button>
                              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </button>
                              <button type="button" class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                <i class="fa fa-star" aria-hidden="true"></i>
                              </button>
                           </div>

                           <div>
                              <?= form_open('reviews/insert/'.$listings_id,['method'=>'POST']); ?>                                 
                                 <?= form_input(['type'=>'hidden','name'=>'star_rates','id'=>'selected_rating','required'=>'required'] ) ?>
                                 <textarea rows=5 placeholder="Write a review..." name="reviews"></textarea> 
                              
                                 <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button> 
                                 </div>
                              <?php form_close(); ?>
                           </div>
                        </div>                                                
                     </div>
                  </div>
               </div>