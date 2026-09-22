<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Help Care</title>

<style>
*{
  box-sizing:border-box;
  margin:0;
  padding:0;
  font-family:Arial,sans-serif;
}

body{
  background:#f2f4f8;
  color:#222;
}

.help-care{
  max-width:430px;
  min-height:100vh;
  margin:auto;
  background:#fff;
  display:flex;
  flex-direction:column;
}

.header{
  background:linear-gradient(135deg,#075e54,#128c7e);
  color:#fff;
  padding:18px 16px;
  text-align:center;
}

.header h2{
  font-size:22px;
}

.header p{
  font-size:13px;
  margin-top:5px;
  opacity:.9;
}

.content{
  padding:15px;
  flex:1;
  overflow-y:auto;
}

.section-title{
  font-size:15px;
  font-weight:bold;
  margin-bottom:10px;
}

.problem-grid{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:10px;
  margin-bottom:18px;
}

.problem{
  border:1px solid #ddd;
  border-radius:12px;
  padding:13px 8px;
  background:#fafafa;
  text-align:center;
  cursor:pointer;
  transition:.2s;
}

.problem:hover{
  background:#e9f7f4;
  border-color:#128c7e;
}

.problem.active{
  background:#dff5f0;
  border-color:#128c7e;
}

.problem .icon{
  font-size:25px;
  display:block;
  margin-bottom:6px;
}

.problem span{
  font-size:13px;
  font-weight:600;
}

.chat-box{
  border:1px solid #ddd;
  border-radius:14px;
  overflow:hidden;
  background:#fafafa;
}

.chat-title{
  padding:12px;
  background:#f0f0f0;
  font-weight:bold;
  font-size:14px;
}

.messages{
  height:180px;
  padding:12px;
  overflow-y:auto;
}

.message{
  max-width:82%;
  padding:9px 11px;
  border-radius:12px;
  margin-bottom:9px;
  font-size:13px;
}

.support{
  background:#e5e5e5;
  border-bottom-left-radius:3px;
}

.user{
  background:#c8f7df;
  margin-left:auto;
  border-bottom-right-radius:3px;
}

.input-area{
  border-top:1px solid #ddd;
  padding:9px;
  display:flex;
  align-items:center;
  gap:7px;
  background:#fff;
}

.attach{
  width:38px;
  height:38px;
  border:0;
  border-radius:50%;
  background:#eee;
  font-size:19px;
  cursor:pointer;
}

#message{
  flex:1;
  border:1px solid #ddd;
  border-radius:20px;
  padding:10px 13px;
  outline:none;
}

.send{
  width:42px;
  height:38px;
  border:0;
  border-radius:20px;
  background:#128c7e;
  color:#fff;
  cursor:pointer;
  font-size:17px;
}

.file-name{
  font-size:12px;
  color:#128c7e;
  padding:0 12px 8px;
}

.footer{
  padding:10px 15px;
  text-align:center;
  font-size:11px;
  color:#777;
}
</style>
</head>

<body>

<div class="help-care">

  <div class="header">
    <h2>🛟 Help Care</h2>
    <p>আপনার সমস্যাটি নির্বাচন করে আমাদের সাথে যোগাযোগ করুন</p>
  </div>

  <div class="content">

    <div class="section-title">আপনার সমস্যার ধরন নির্বাচন করুন</div>

    <div class="problem-grid">

      <div class="problem" onclick="selectProblem(this,'পাসওয়ার্ড রেজিস্টার করুন')">
        <span class="icon">🔐</span>
        <span>পাসওয়ার্ড রেজিস্টার</span>
      </div>

      <div class="problem" onclick="selectProblem(this,'নতুন পাসওয়ার্ড দিয়ে পুরাতন পাসওয়ার্ড পরিবর্তন')">
        <span class="icon">🔄</span>
        <span>পাসওয়ার্ড পরিবর্তন</span>
      </div>

      <div class="problem" onclick="selectProblem(this,'অ্যাকাউন্ট প্রবলেম')">
        <span class="icon">👤</span>
        <span>অ্যাকাউন্ট প্রবলেম</span>
      </div>

      <div class="problem" onclick="selectProblem(this,'টাকা ডিপোজিট প্রবলেম')">
        <span class="icon">💰</span>
        <span>ডিপোজিট সমস্যা</span>
      </div>

      <div class="problem" onclick="selectProblem(this,'টার্নওভার সমস্যা')">
        <span class="icon">🔄</span>
        <span>টার্নওভার সমস্যা</span>
      </div>

      <div class="problem" onclick="selectProblem(this,'টাকা উইথড্র সমস্যা')">
        <span class="icon">💸</span>
        <span>উইথড্র সমস্যা</span>
      </div>

      <div class="problem" onclick="selectProblem(this,'অন্যান্য সমস্যা')">
        <span class="icon">💬</span>
        <span>অন্যান্য সমস্যা</span>
      </div>

    </div>

    <div class="chat-box">

      <div class="chat-title">
        💬 Help Care Chat
      </div>

      <div class="messages" id="messages">
        <div class="message support">
          আসসালামু আলাইকুম। Help Care-এ আপনাকে স্বাগতম। আপনার সমস্যাটি লিখুন।
        </div>
      </div>

      <div class="file-name" id="fileName"></div>

      <div class="input-area">

        <label class="attach">
          📎
          <input type="file"
                 id="imageInput"
                 accept="image/*"
                 hidden
                 onchange="showFile()">
        </label>

        <input
          type="text"
          id="message"
          placeholder="আপনার সমস্যা লিখুন..."
          onkeydown="if(event.key==='Enter') sendMessage()">

        <button class="send" onclick="sendMessage()">➤</button>

      </div>

    </div>

  </div>

  <div class="footer">
    Help Care Support • আপনার সমস্যার বিস্তারিত তথ্য দিন
  </div>

</div>

<script>

let selectedProblem = "";

function selectProblem(element, problem){

  document.querySelectorAll(".problem")
    .forEach(item => item.classList.remove("active"));

  element.classList.add("active");

  selectedProblem = problem;

  const messageBox = document.getElementById("message");

  messageBox.value = problem + " সম্পর্কে আমার সাহায্য প্রয়োজন।";

  messageBox.focus();
}

function sendMessage(){

  const input = document.getElementById("message");
  const messages = document.getElementById("messages");

  const text = input.value.trim();

  if(text === ""){
    alert("দয়া করে আপনার সমস্যাটি লিখুন।");
    return;
  }

  const div = document.createElement("div");
  div.className = "message user";
  div.textContent = text;

  messages.appendChild(div);

  input.value = "";

  messages.scrollTop = messages.scrollHeight;

  setTimeout(() => {

    const support = document.createElement("div");
    support.className = "message support";
    support.textContent =
      "আপনার মেসেজটি পেয়েছি। Help Care Support Team শীঘ্রই আপনার সাথে যোগাযোগ করবে।";

    messages.appendChild(support);

    messages.scrollTop = messages.scrollHeight;

  },800);
}

function showFile(){

  const input = document.getElementById("imageInput");
  const fileName = document.getElementById("fileName");

  if(input.files.length > 0){

    fileName.textContent =
      "🖼️ ছবি সংযুক্ত হয়েছে: " + input.files[0].name;

  }

}

</script>

</body>
</html>
