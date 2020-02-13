<?php // print_r($faqs); ?>
      <!-- End Navbar -->
      
	  <!-- Breadcumb -->
      <section class="breadcumb_area">
         <div class="container">
            <div class="row">
               <div class="col-xs-12 text-center">
                  <div class="breadcumb_section">
                     <div class="page_title">
                        <h3>
                           Frequently Asked Questions
                        </h3>
                     </div>
                     <div class="page_pagination">
                        <ul>
                           <li><a href="index.html">Home</a></li>
                           <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                           <li>
                              Frequently Asked Questions
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Breadcumb -->
      
	  <!-- FAQ -->
      <section class="faq">
         <div class="container">
         <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
               <div class="widget margin-bottom-none">
                  <div class="panel-group margin-bottom-none" id="faqAccordion">
                     <?php foreach ($faqs as $key => $faq) { ?>
                        <div class="panel panel-default ">
                           <div class="panel-heading accordion-toggle question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question<?php echo $faq['ID']; ?>" aria-expanded="true">
                              <h4 class="panel-title">
                                 <a href="#" class="ing">Q: <?php echo $faq['question']; ?></a>
                              </h4>
                           </div>
                           <div id="question<?php echo $faq['ID']; ?>" class="panel-collapse collapse" style="" aria-expanded="true">
                              <div class="panel-body">
                                 <h5><span class="label label-primary">Answer</span></h5>
                                 <?php echo $faq['answer']; ?>
                              </div>
                           </div>
                        </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End FAQ -->
      
	  <!-- Footer -->
<style type="text/css">
.panel-title p{
   width: fit-content;
   width: -moz-fit-content;
   display: inline-block;
   margin: 0;
}
.panel-title a.ing:hover,.panel-title a.ing:hover p{
   color: #2a63aa
}
</style>