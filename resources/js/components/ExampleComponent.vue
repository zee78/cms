<template>
  <div class="content-grid padding-new">
    
    <!-- GRID -->
    <div class="grid grid-3-12 medium-space">
      <!-- GRID COLUMN -->
      <div class="account-hub-content">
        <!-- CHAT WIDGET WRAP -->
        <div class="chat-widget-wrap">
          <div class="chat-widget static">
            <ul class="nav nav-tabs nav-justified chat-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="friends-tab" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="true">Chat</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="friends" role="tabpanel" aria-labelledby="friends-tab">
                
                <div class="chat-widget-messages">
                  <div class="chat-widget-message user-list-item" :id="friends.friend_id" v-for="friends in friendList" @click="getSingleChat(friends)">
                    <div class="user-status">
                      <template v-if="friends.sender_id == userdata.id">
                        <div class="user-status-avatar">
                          <div class="user-avatar small no-outline">
                            <div class="user-avatar-content">
                              <!-- <template v-if="friends.receiver_image != ''">
                                <div class="hexagon-image-30-32" data-src="'/img/profileimage/'+friends.receiver_image"><img :src="'/img/profileimage/'+friends.receiver_image"></div> 
                              </template> -->
                              <template>
                                <div class="hexagon-image-30-32" data-src="'assets/img/user.png'"><img :src="'assets/img/user.png'"></div>
                              </template>
                            </div>
                            <div class="user-avatar-progress">
                              <div class="hexagon-progress-40-44"></div>
                            </div>
                            <div class="user-avatar-progress-border">
                              <div class="hexagon-border-40-44"></div>
                            </div>
                            <div class="user-avatar-badge">
                              <div class="user-avatar-badge-border">
                                <div class="hexagon-22-24"></div>
                              </div>
                              <div class="user-avatar-badge-content">
                                <div class="hexagon-dark-16-18"></div>
                              </div>
                              <!-- <p class="user-avatar-badge-text">6</p> -->
                            </div>
                          </div>
                        </div>
                      </template>
                      <template v-else>
                        <div class="user-status-avatar">
                          <div class="user-avatar small no-outline">
                            <div class="user-avatar-content">
                              <!-- <template v-if="friends.sender_image != ''">
                                <div class="hexagon-image-30-32" data-src="'/img/profileimage/'+friends.sender_image"><img :src="'/img/profileimage/'+friends.sender_image"></div>
                              </template> -->
                              <template>
                                <div class="hexagon-image-30-32" data-src="'assets/img/user.png'"><img :src="'assets/img/user.png'"></div>
                              </template>
                            </div>
                            <div class="user-avatar-progress">
                              <div class="hexagon-progress-40-44"></div>
                            </div>
                            <div class="user-avatar-progress-border">
                              <div class="hexagon-border-40-44"></div>
                            </div>
                            <div class="user-avatar-badge">
                              <div class="user-avatar-badge-border">
                                <div class="hexagon-22-24"></div>
                              </div>
                              <div class="user-avatar-badge-content">
                                <div class="hexagon-dark-16-18"></div>
                              </div>
                              <!-- <p class="user-avatar-badge-text">6</p> -->
                            </div>
                          </div>
                        </div>
                      </template>
                      <p class="user-status-title mt-2">
                        <template v-if="friends.sender_id == userdata.id">
                          <span class="bold">{{friends.receiver_name}}</span>
                        </template>
                        <template v-else>
                          <span class="bold">{{friends.sender_name}}</span>
                        </template>
                      </p>
                      <!-- <p class="user-status-text">Great! Then we'll meet with them at the party...</p> -->
                      <p class="user-status-timestamp floaty">{{friends.created_at}}</p>
                    </div>
                  </div>
                  <!-- CHAT WIDGET MESSAGE -->
                </div>
              </div>
            </div>
            <!-- /CHAT WIDGET MESSAGES -->
            <!-- CHAT WIDGET FORM -->
            <form class="chat-widget-form">
              <div class="interactive-input small">
                <input type="text" id="chat-widget-search-2" name="chat_widget_search_2" placeholder="Search Messages...">
                <div class="interactive-input-icon-wrap">
                  <svg class="interactive-input-icon icon-magnifying-glass">
                    <use xlink:href="#svg-magnifying-glass"></use>
                  </svg>
                </div>
                <div class="interactive-input-action">
                  <svg class="interactive-input-action-icon icon-cross-thin">
                    <use xlink:href="#svg-cross-thin"></use>
                  </svg>
                </div>
              </div>
            </form>
            <!-- /CHAT WIDGET FORM -->
          </div>
          <!-- /CHAT WIDGET -->

          <!-- CHAT WIDGET -->
          <div class="chat-widget message-body">
            <center id="selectConversation" class="mt-5 pt-5 mt-sm-5 pt-sm-5" >
              <img src="http://203.99.61.173/demos/gigtodo35/images/chat.png" width="180" alt="">
              <h3 class="mt-3 empty-heading" style="font-weight:410;">Select a Conversation</h3>
              <p class="lead">Try selecting a conversation or searching for someone specific.</p>
            </center>
            <div id="startchat" style="display: none;">
              <div class="chat-widget-header">
                <!-- <div class="chat-widget-settings">
                  <div class="post-settings-wrap">
                    <div class="post-settings widget-box-post-settings-dropdown-trigger">
                      <svg class="post-settings-icon icon-more-dots">
                        <use xlink:href="#svg-more-dots"></use>
                      </svg>
                    </div>
                    <div class="simple-dropdown widget-box-post-settings-dropdown">
                      <p class="simple-dropdown-link">Report</p>
                      <p class="simple-dropdown-link">Block</p>
                      <p class="simple-dropdown-link">Mute</p>
                    </div>
                  </div>
                </div> -->
                <span class="closeMsg d-lg-none d-md-none"><i class="fa fa-chevron-left"></i></span>
                <div class="user-status">
                  <div class="user-status-avatar">
                    <div class="user-avatar small no-outline online">
                      <div class="user-avatar-content">
                        <!-- <template v-if="friendImage != ''">
                          <div class="hexagon-image-30-32" data-src="'/img/profileimage/'+friendImage"><img :src="'/img/profileimage/'+friendImage"></div>
                        </template> -->
                        <template>
                        <div class="hexagon-image-30-32" data-src="'assets/img/user.png'"><img :src="'assets/img/user.png'"></div>
                        </template>
                      </div>
                      <div class="user-avatar-progress">
                        <div class="hexagon-progress-40-44"></div>
                      </div>
                      <div class="user-avatar-progress-border">
                        <div class="hexagon-border-40-44"></div>
                      </div>
                      <div class="user-avatar-badge">
                        <div class="user-avatar-badge-border">
                          <div class="hexagon-22-24"></div>
                        </div>
                        <div class="user-avatar-badge-content">
                          <div class="hexagon-dark-16-18"></div>
                        </div>
                        <!-- <p class="user-avatar-badge-text">16</p> -->
                      </div>
                    </div>
                  </div>
                  <p class="user-status-title"><span class="bold">{{friendName}}</span></p>
                  <!-- <p class="user-status-tag online">Online</p> -->
                </div>
              </div>
              <!-- /CHAT WIDGET HEADER -->
              <!-- CHAT WIDGET CONVERSATION -->
              <div class="chat-widget-conversation">
                <div class="chat-widget-speaker right" v-for=" chat in singleChate"  v-if="chat.sender_id == userdata.id">
                  <p class="chat-widget-speaker-message">{{chat.message}}</p>
                  <template v-if="chat.message_type == 1">
                    <div>
                      <img :src="'/chat_images/'+chat.file" alt="..." class="img-thumbnail" width="100">
                    </div>
                    
                    <a :href="'/chat_images/'+chat.file" download class="d-block mt-2 ml-1"  style="color: #ff0707;">
                    <i class="fa fa-download"></i> {{chat.file}}
                    </a>
                    </template>
                  <p class="chat-widget-speaker-timestamp">{{istoday(chat.created_at)}}</p>
                </div>
                <div class="chat-widget-speaker left" v-else>
                  <div class="chat-widget-speaker-avatar">
                    <div class="user-avatar tiny no-border">
                      <div class="user-avatar-content">
                        <template v-if="friendImage != ''">
                          <div class="hexagon-image-24-26" data-src="'/img/profileimage/'+friendImage"><img :src="'/img/profileimage/'+friendImage"></div>
                        </template>
                        <template v-else>
                        <div class="hexagon-image-24-26" data-src="'/img/user.png'"><img :src="'/img/user.png'"></div>
                        </template>
                      </div>
                    </div>
                  </div>
                  <p class="chat-widget-speaker-message">{{chat.message}}</p>
                  <template v-if="chat.message_type == 1">
                    <div>
                      <img :src="'/chat_images/'+chat.file" alt="..." class="img-thumbnail" width="100">
                    </div>
                    
                    <a :href="'/chat_images/'+chat.file" download class="d-block mt-2 ml-1"  style="color: #ff0707;">
                    <i class="fa fa-download"></i> {{chat.file}}
                    </a>
                    </template>
                  <p class="chat-widget-speaker-timestamp">{{istoday(chat.created_at)}}</p>
                </div>
                <!-- CHAT WIDGET SPEAKER -->
              </div>
              <!-- /CHAT WIDGET CONVERSATION -->

              <!-- CHAT WIDGET FORM -->
              <!-- <form class="chat-widget-form"> -->
              <div class="chat-widget-form">
                        
                <div class="form-row split">
                  <div class="form-item">
                    <input type="hidden" name="sender_id" v-model="sender_id">
                    <input type="hidden" name="receiver_id" v-model="receiver_id">
                    <input type="hidden" name="receiver_name" v-model="receiver_name" >
                    <div class="interactive-input small">
                      <input type="text" id="send_message" v-model="message" placeholder="Write a message...">
                      <emoji-picker @emoji="append" :search="search">
                        <div
                          class="emoji-invoker"
                          slot="emoji-invoker"
                          slot-scope="{ events: { click: clickEvent } }"
                          @click.stop="clickEvent"
                        >
                          <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                          </svg>
                        </div>
                        <div slot="emoji-picker" slot-scope="{ emojis, insert, display }">
                          <div class="emoji-picker" :style="{ top: display.y + 'px', left: display.x + 'px' }">
                            <div class="emoji-picker__search">
                              <input type="text" v-model="search" v-focus>
                            </div>
                            <div>
                              <div v-for="(emojiGroup, category) in emojis" :key="category">
                                <h5>{{ category }}</h5>
                                <div class="emojis">
                                  <span
                                    v-for="(emoji, emojiName) in emojiGroup"
                                    :key="emojiName"
                                    @click="insert(emoji)"
                                    :title="emojiName"
                                  >{{ emoji }}</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </emoji-picker>
                      <label for="file" class="interactive-input-icon-wrap actionable">
                        <div class="interactive-input-icon-wrap actionable">
                          <input type="file" ref="msg_file" id="file" hidden="" />
                          <div class="tooltip-wrap text-tooltip-tft" data-title="Send Photo">
                            <svg class="interactive-input-icon icon-camera">
                              <use xlink:href="#svg-camera"></use>
                            </svg>
                          </div>
                        </div>
                      </label>
                      <div class="interactive-input-action">
                        <svg class="interactive-input-action-icon icon-cross-thin">
                          <use xlink:href="#svg-cross-thin"></use>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <div class="form-item auto-width">
                    <button class="button primary padded send-message" @click="sendMessage" id="send-msg">
                      <svg class="button-icon no-space icon-send-message">
                        <use xlink:href="#svg-send-message"></use>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- </form> -->
          </div>
        </div>
        <!-- /CHAT WIDGET WRAP -->
      </div>
      <!-- /GRID COLUMN -->
    </div>
    <!-- /GRID -->
  </div>
  <!-- /CONTENT GRID -->
  <!-- Modal -->
    
</template>

<script>
      import moment from 'moment';
      // import VEmojiPicker from 'v-emoji-picker';
      import EmojiPicker from 'vue-emoji-picker';
      Vue.use(EmojiPicker);
    export default {
        name: 'ExampleComponent',
        components: { EmojiPicker },
        props: [
          'userdata',
        ],
        data: function() {
            return {
                dataMessages: [],
                message: "",
                sender_id: "",
                receiver_id: "",
                receiver_name: "",
                ads_id: "1",
                file: "",
                users: "",
                error: "",
                userr: "",
                friendList: [],
                singleChate: [],
                singleChatUser: "",
                friendName:"",
                user_names:"",
                friendId:"",
                friendImage:"",
                ischatemojiActive:false,
                search: '',
                havegroup:false,
                groupName:'',
                multiplemembers:[],
                multipleneewmembers:[],
                groupData: {},
                userGroups: [],
            }
        },
        mounted() {
          // console.log(this.userdata.username);
         // localStorage.setItem('userdata.id', this.userid);
        
        this.userr =  this.userdata.id;
         // localStorage.setItem('userName', this.userName);
        // this.userr = 3;
        this.user_names =  this.userdata.username;
        // this.user_names = 'waqas';
        // console.log(this.user_names);
        this.friendlist();
        var socket = io.connect('https://peekvideochat.com:22000/');
        
        //console.log(socket);
            socket.on('userCount', function (data) {
                this.users = data.userCount;
            }.bind(this));
            socket.on("birdsreceivemsg", function(data){
            console.log(data.receiver_id+''+this.userdata.id);
            if(data.receiver_id == this.userdata.id){
                this.singleChate.push(data);
                var height = 0;
                $(".chat-widget-conversation").each(function(i, value){
                  height += parseInt($(this).height());
                });
                height += 20000;
                $(".chat-widget-conversation").animate({scrollTop: height});
              }
            }.bind(this));
        },
        methods: {
            istoday: function (date) {
              return moment(date).calendar();
            },
            friendlist: function(){
              axios.get('http://localhost:8000/api/friendsList/'+this.userr)
               .then(responce => {
                 console.log(responce.data);
               this.friendList = responce.data;
               console.log(this.friendList);
              })
            },
            getSingleChat: function(single){
              this.singleChatUser = single;
              $('.user-list-item.active').removeClass('active');
              $('#'+this.singleChatUser.friend_id).addClass('active');
              $('#selectConversation').hide();
              $('#startchat').show();
              var height = 0;
              $(".chat-widget-conversation").each(function(i, value){
                height += parseInt($(this).height());
              });
              height += 20000;
              $(".chat-widget-conversation").animate({scrollTop: height});
              

              console.log(this.singleChatUser);
              if(this.singleChatUser.sender_id == this.userr){
                this.userImage=this.singleChatUser.sender_image;
                this.friendName=this.singleChatUser.receiver_name;
                this.friendId=this.singleChatUser.receiver_id;
                this.friendImage=this.singleChatUser.receiver_image;
              //console.log(this.friendImage);
              }else{
                    this.friendName=this.singleChatUser.sender_name;
                    this.friendId=this.singleChatUser.sender_id;
                    this.friendImage=this.singleChatUser.sender_image;
                    this.userImage=this.singleChatUser.receiver_image;
                    //console.log(this.friendImage);
              }
              axios.post('http://localhost:8000/api/singleChat',{'sender_id':single.sender_id,'receiver_id':single.receiver_id})
               .then(responce => {
                console.log(responce.data);

               this.singleChate = responce.data;
              })
            },
            sendMessage: function() {
            var socket = io.connect('https://peekvideochat.com:22000/');
            
            var config = {
              header: {
                'Content-Type': 'multipart/form-data'
              }
            }
          // console.log(this.friendId);
            let meeting_file =  this.$refs.msg_file.files;
                //console.log(meeting_file+',,,,');
                
              var meetingformDatas = new FormData();
                
                  meetingformDatas.append('file',meeting_file[0]);
                  meetingformDatas.append('sender_id',this.userr);
                  meetingformDatas.append('receiver_id',this.friendId);
                  meetingformDatas.append('receiver_name',this.friendName);
                  meetingformDatas.append('sender_name',this.user_names);
                  meetingformDatas.append('message',this.message);
               
             
              var d = new Date($.now());
              var time = d.getFullYear()+"-"+(d.getMonth() + 1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            var  message_type = 0;
            var filename = '';
              if(meeting_file.length > 0){
                 var message_type = 1;
                 filename = meeting_file[0].name;
              }
             
              var obj ={
                sender_id: this.userr,
                receiver_id: this.friendId,
                message: this.message,
                file: filename,
                message_type: message_type,
                sender_name: this.user_names,
                created_at: time,
              }
              //console.log(filename+'hghghgh');
              // meetingformDatas.append('meetingformDatas', obj);
              // console.log(obj);
              // socket.emit('message', obj);
              
                  axios.post('http://localhost:8000/api/send-message',meetingformDatas,config)
                   .then(responce => {
                    this.singleChate.push(obj);
                    var height = 0;
                    $(".chat-widget-conversation").each(function(i, value){
                      height += parseInt($(this).height());
                    });
                    height += 20000;
                    $(".chat-widget-conversation").animate({scrollTop: height});
                    socket.emit('message', obj);
                   
                   this.message = "";
                   this.$refs.msg_file.value=null;

                  })
             
                
            },
            // selectchatEmoji(emoji) {
            //   this.message += emoji.data;
            //   console.log(this.message);
              
            //     $('#send_message').removeClass('disabled').attr("disabled", false);
              
            // },
            // showChatemoji(){
            //     this.ischatemojiActive = !this.ischatemojiActive;
            // },
            append(emoji) {
                this.message += emoji
            },
        },
        directives: {
            focus: {
              inserted(el) {
                el.focus()
              },
            },
          },
    }

    jQuery(document).ready(function($){
        var height = 0;
        $(".chat-widget-conversation").each(function(i, value){
          height += parseInt($(this).height());
        });
        height += 20000;
        $(".chat-widget-conversation").animate({scrollTop: height});
    
        var login_seller_id = "<?= $login_seller_id; ?>";
        var seller_id = "<?= $seller_id; ?>";
        var message_group_id = "<?= $message_group_id ?>";
    
        $(document).off('submit').on('submit','#insert-message-form', function(event){
          event.preventDefault();
          sendMessage();
          $(this).off('submit'); 
        });
    
        $(document).on('click', '.closeMsg', function(e){
          event.preventDefault();
          $(".chat-widget.static").show();
          $(".message-body").hide();
        });
    
        $('.closeMsg').on('click', function(){
          $(this).parents('.message-body').removeClass('active position-relative');
          $('.user-list-item').removeClass('active');
        });
    
        if ( $(window).width() > 767) {
         // Add your javascript for large screens here 
        }else {
          $('.message-body').hide();
          $(document).on('click', '.user-list-item', function(){
            $('.user-list-item').removeClass('active');
            $(this).addClass('active');
            $('.message-body').addClass('active position-relative');
            $('.chat-widget.static').hide();
            $('.message-body').show();
            // $('.specfic.col-md-8').attr("class","specfic col-md-12");
            $('#msgSidebar').hide();
          });
        }
    });
</script>
<style>
  .send-message{
    border-radius: 12px;
  }
  .form-item.split {
    position: relative;
    display: inline-block;
  }

  .regular-input {
    padding: 0.5rem 1rem;
    border-radius: 3px;
    border: 1px solid #ccc;
    width: 20rem;
    height: 12rem;
    outline: none;
  }

  .regular-input:focus {
    box-shadow: 0 0 0 3px rgba(66,153,225,.5);
  }

  .emoji-invoker {
    position: absolute;
    top: 0.8rem;
    right: 3.5rem;
    width: 1.5rem;
    height: 1.5rem;
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.2s;
  }
  .emoji-invoker:hover {
    transform: scale(1.1);
  }
  .emoji-invoker > svg {
    fill: #b1c6d0;
  }

  .emoji-picker {
    position: absolute;
    z-index: 1;
    font-family: Montserrat;
    border: 1px solid #ccc;
    width: 15rem;
    height: 20rem;
    overflow: scroll;
    padding: 1rem;
    box-sizing: border-box;
    border-radius: 0.5rem;
    background: #fff;
    box-shadow: 1px 1px 8px #c7dbe6;
    top: -320px !important;
    left: 280px !important;
    font-size: 14px;
  }
  .emoji-picker__search {
    display: flex;
    margin-bottom: 15px;
  }
  .emoji-picker__search > input {
    flex: 1;
    border-radius: 10rem;
    border: 1px solid #ccc;
    padding: 0.5rem 1rem;
    outline: none;
    font-size: 0.7rem;
  }
  .emoji-picker h5 {
    margin-bottom: 0;
    color: #b1b1b1;
    text-transform: uppercase;
    font-size: 0.8rem;
    cursor: default;
  }
  .emoji-picker .emojis {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  .emoji-picker .emojis:after {
    content: "";
    flex: auto;
  }
  .emoji-picker .emojis span {
    padding: 0.2rem;
    cursor: pointer;
    border-radius: 5px;
  }
  .emoji-picker .emojis span:hover {
    background: #ececec;
    cursor: pointer;
  }
  .closeMsg{
    position: absolute;
    left: 10px;
    top: 27px;
    font-size: 20px;
  }
  .bg-img{
    width: 40px;
    height: 40px;
  }
  .btn-danger{
    width: 90px;
  }
  .btn-primary{
    width: 100px;
  }
  @media screen and (max-width: 960px){
    .emoji-picker{
      left: 0 !important;
    }
  }
</style>
