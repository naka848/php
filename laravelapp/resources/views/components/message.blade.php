<style>
    .message{
        border: double 4px rgb(194, 87, 87);
        margin: 10px;
        padding: 10px;
        background-color: #a8e7e9;
    }
    .msg_title{
        margin: 10px 20px;
        color: rgb(36, 138, 221);
        font-size: 16pt;
        font-weight: bold;
    }
    .msg_content{
        margin: 10px 20px;
        color: rgb(29, 26, 211);
        font-size: 12pt;
    }
</style>

<div class="message">
    <p class="msg_title">{{ $msg_title }}</p>
    <p class="msg_content">{{ $msg_content }}</p>
</div>