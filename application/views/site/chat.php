 
<div class="container">
  <h3 class="text-center chat-heading">Chats</h3>
  <div class="messaging">
    <div class="inbox_msg">
      <div class="inbox_people">
        <div class="headind_srch">
          <div class="recent_heading">
            <h4>Recent</h4>
          </div>
          <!-- <div class="srch_bar">
            <div class="stylish-input-group">
              <input type="text" class="search-bar"  placeholder="Search" >
              <span class="input-group-addon">
              <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
              </span>
            </div>
          </div> -->
        </div>
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#block_modal"><i class="fa fa-star"></i> Block</button> -->
              <div class="inbox_chat">
        <?php 

        $chat_node = $this->uri->segment('2');

      //echo $chat_node; die();        



        for ($i=0; $i < count($users); $i++) { 
            if($users[$i]['status'] == 0){
              if($chat_node == $users[$i]['chat_node']) { ?>

                  <a href="javascript:void(0)" class="get-chat-active" onclick="get_messages_fire(this)">                
                  <div class="chat_list active_chat">
                    <div class="chat_people">
                      <span class="nbt-count"></span>
                      <div class="chat_img"> <img src="<?php if($users[$i]['user_profile']==''){echo base_url('site-assets/images/users/default-user.png'); }else{echo base_url('site-assets/images/users/'.$users[$i]['user_profile']); } ?>" alt="users"></div>
                      <div class="chat_ib">
                        <h5><?= $users[$i]['user_nicename'] ?> <span class="chat_date">Dec 25</span></h5>
                        <p>Test, which is a new approach to have all solutions 
                          astrology under one roof.</p>
                      </div>
                    </div>
                  </div> 
                  <input type="hidden" class="chat-node <?= $users[$i]['chat_node'] ?>" value="<?= $users[$i]['chat_node'] ?>">
                  </a>

                <?php  }else{ 


                  ?>

                  <a href="javascript:void(0)" onclick="get_messages_fire(this)">                
                  <div class="chat_list active_chat">
                    <div class="chat_people">
                      <span class="nbt-count"></span>

                      <div class="chat_img"> <img src="<?php if($users[$i]['user_profile']==''){echo base_url('site-assets/images/users/default-user.png'); }else{echo base_url('site-assets/images/users/'.$users[$i]['user_profile']); } ?>" alt="users"> </div>
                      <div class="chat_ib">
                        <h5><?= $users[$i]['user_nicename'] ?> <span class="chat_date">Dec 25</span></h5>
                        <p>Test, which is a new approach to have all solutions 
                          astrology under one roof.</p>
                      </div>
                    </div>
                  </div> 
                  <input type="hidden" class="chat-node <?= $users[$i]['chat_node'] ?>" value="<?= $users[$i]['chat_node'] ?>">
                  </a>


           <?php }}else{
                    //echo "string"; die();

            ?>


                  <a href="javascript:void(0)"  class="block" onclick="get_messages_fire(this)">                
                    <div class="chat_list active_chat">
                      <div class="chat_people">
                        <span class="nbt-count"></span>

                        <div class="chat_img"> <img src="<?php if($users[$i]['user_profile']==''){echo base_url('site-assets/images/users/default-user.png'); }else{echo base_url('site-assets/images/users/'.$users[$i]['user_profile']); } ?>" alt="users"> </div>
                        <div class="chat_ib">
                          <h5><?= $users[$i]['user_nicename'] ?> <span class="chat_date">Dec 25</span></h5>
                          <p>Test, which is a new approach to have all solutions 
                            astrology under one roof.</p>
                        </div>
                      </div>
                    </div> 
                    <input type="hidden" class="chat-node <?= $users[$i]['chat_node'] ?>" value="<?= $users[$i]['chat_node'] ?>">
                  </a>



          <?php }} ?>

              </div>            
      </div>
      <div class="mesgs">
        <div class="msg_history" id="messages">

        </div>
        <div class="type_msg">
          <div class="input_msg_write">
          <p id="chat-img_1" class="chat-img-name" style="display: none;"></p>
        <!-- <img id="chat-img_1" src="#" alt="your image" style="display: none;" /> -->
            <input type="text" class="write_msg" id="message" placeholder="Type a message" />
            <!-- <input type="file" id="chat-docx"> -->
            <div class="inputfile-box">
              <input type="file" id="chat-docx" class="inputfile" onchange="uploadFile(this)">
              <label for="chat-docx">
                <span class="file-button">
                  <i class="fa fa-image" aria-hidden="true"></i>
                </span>
              </label>
            </div>
            <ul class="chat-select">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-ellipsis-h"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#block_modal">
                    Block
                  </a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 


<div class="modal fade" id="block_modal">
  <div class="modal-dialog modal-xl">
     <div class="modal-content">                     
       <!-- Modal Header -->
        <div class="modal-header">
           <h4 class="modal-title"><b> Block User</b></h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
       
       <!-- Modal body -->
        <div class="modal-body">
           <div>
              <?= form_open('chats/block/BEN-CHAT-14-SAAS-1NJDD33',['method'=>'POST']); ?>                                 
                 
                 <textarea rows=5 placeholder="Write a reason..." name="reason" class="text-res"></textarea> 
              
                 <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Block</button> 
                 </div>
              <?php form_close(); ?>
           </div>
        </div>                                                
     </div>
  </div>
</div>



<style>
  .chat-img-name {
    font-weight: 600;
    position: absolute;
    right: 10px;
    top: -27px;
}
  /* Start */
  a.dropdown-item{
    display: block;
  }
  .inputfile-box {
  position: absolute;
  width: 34px;
  top: 10px;
  right: 40px;
}

.inputfile {
  display: none !important;
}
.inputfile-box label{
  width: 90px;
  cursor: pointer;
}

.file-box {
  display: inline-block;
  width: 100%;
  color: #333;
  border: 1px solid #05728f;
  padding: 5px 0px 5px 5px;
  box-sizing: border-box;
  height: 30px;
}

.file-button {
  background: #05728f;
  color: #fff;
  padding: 5px;
  width: 33px;
  height: 33px;
  border-radius: 25px;
  display: inline-block;
  text-align: center;
}
.file-button i{
  position: absolute;
  top: 37%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.dropdown-menu{
  bottom: 120%;
  top: unset;
  left: unset;
  text-align: center;
  right: -70px;
}
#navbarDropdownMenuLink i{
  color: #fff;
  font-size: 20px;
  position: absolute;
  top: 44%;
  left: 50%;
  transform: translate(-50%, -50%);
}
#navbarDropdownMenuLink{
  width: 33px;
  height: 33px;
  display: inline-block;
  text-align: center;
  border-radius: 20px;
}
  .chat-select{width: 33px;
    height: 33px;
    border-radius: 20px;
    position: absolute;
    z-index: 111;
    top: 10px;
    right: 80px;
    background: #05728f;  }
    /* End */
  .inbox_people a{

    display: inline-block;
  }

  .block{

    background: #1f1d1d38;
  }


  .text-res{
    
    width: 90%;
    border: #c0c5ba solid 1px;
    padding: 6px;

  }
  .container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
  position: absolute;
  top: 5px;
  right: 0;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 0 0 0;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px;
  width:100%; 
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
  padding: 0 40px 0 10px;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
/*----------------------------*/
.stylish-input-group{
  position: relative;
}
.messaging .input-group-addon{
  border: none;
}
.search-bar {
    outline: none;
}
.chat-heading {
    font-size: 30px;
    padding: 20px 0;
    font-weight: 500;
}
.get-chat-active .active_chat {
    border: 1px solid #2a63aa;
}
 
.modal-header h4 {
   width: fit-content;
   float: left;
}

.modal-body textarea{
   width: 100%;
   border: 1px solid #ccc;
}  
 

</style>
 

