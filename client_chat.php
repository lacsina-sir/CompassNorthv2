<?php
// Sample placeholder - handle the form submit
$sentMessage = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $sentMessage = htmlspecialchars($_POST['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Client Chats | Titulo</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f6f9;
    }

    .topnav {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 60px;
      background-color: #1d3557;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 40px;
      z-index: 1000;
    }

    .topnav .brand {
      font-size: 20px;
      font-weight: bold;
    }

    .topnav .nav-links {
      display: flex;
      gap: 20px;
    }

    .topnav .nav-links a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .topnav .nav-links a:hover {
      text-decoration: underline;
    }

    .main {
      margin-top: 80px;
      padding: 20px 40px;
    }

    .chat-container {
      max-width: 800px;
      margin: auto;
      background-color: white;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      height: 500px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .messages {
      flex: 1;
      overflow-y: auto;
      padding-right: 10px;
      margin-bottom: 20px;
    }

    .message {
      margin: 10px 0;
      max-width: 70%;
      padding: 10px 15px;
      border-radius: 12px;
      line-height: 1.4;
    }

    .sent {
      background-color: #1d3557;
      color: white;
      align-self: flex-end;
      border-bottom-right-radius: 0;
    }

    .received {
      background-color: #e4e6eb;
      color: black;
      align-self: flex-start;
      border-bottom-left-radius: 0;
    }

    .chat-input {
      display: flex;
      gap: 10px;
    }

    .chat-input input[type="text"] {
      flex: 1;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    .chat-input button {
      padding: 10px 20px;
      background-color: #1d3557;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    .chat-input button:hover {
      background-color: #2d517f;
    }
  </style>
</head>
<body>

  <!-- Top Navigation -->
  <div class="topnav">
    <div class="brand">Titulo Client Portal</div>
    <div class="nav-links">
      <a href="dashboard.php">Dashboard</a>
      <a href="files.php">Files</a>
      <a href="profile.php">Profile</a>
      <a href="chats.php">Chats</a>
      <a href="updates.php">Updates</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main">
    <div class="chat-container">
      <div class="messages">
        <div class="message received">Hi Juan, we’ve received your request.</div>
        <div class="message sent">Thank you! When will the survey start?</div>
        <div class="message received">We’ll start by Monday. Please prepare your documents.</div>
        <div class="message sent">Noted. Thank you!</div>

        <?php if ($sentMessage): ?>
          <div class="message sent"><?php echo $sentMessage; ?></div>
        <?php endif; ?>
      </div>

      <!-- Chat input -->
      <form method="POST" class="chat-input">
        <input type="text" name="message" placeholder="Type your message..." required>
        <button type="submit">Send</button>
      </form>
    </div>
  </div>

</body>
</html>
