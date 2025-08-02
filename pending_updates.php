<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pending Updates | Titulo</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f4f6f9;
    }
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      height: 100%;
      background: #1d3557;
      color: white;
      padding: 20px;
    }
    .sidebar h2 {
      text-align: center;
      font-size: 20px;
      margin-bottom: 20px;
      border-bottom: 1px solid white;
      padding-bottom: 10px;
    }
    .sidebar a {
      display: block;
      color: white;
      text-decoration: none;
      padding: 10px 0;
    }
    .sidebar a:hover {
      background-color: #457b9d;
    }
    .main {
      margin-left: 240px;
      padding: 20px;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .header h1 {
      margin: 0;
      font-size: 24px;
    }
    .search-box input {
      padding: 8px;
      width: 300px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .table-container {
      background: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    table th, table td {
      padding: 12px;
      border-bottom: 1px solid #eee;
      text-align: left;
    }
    table th {
      background-color: #f0f0f0;
    }
    table tr:hover {
      background-color: #f9f9f9;
    }
    .edit-btn {
      background-color: #1d3557;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 4px;
      cursor: pointer;
    }
    .edit-btn:hover {
      background-color: #457b9d;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h2>Titulo</h2>
  <a href="dashboard.html">Dashboard</a>
  <a href="client_requests.html">Client Requests</a>
  <a href="survey_files.html">Survey Files</a>
  <a href="client_updates.html">Client Updates</a>
  <a href="pending_updates.php">Pending Updates</a>
  <a href="settings.html">Settings</a>
  <a href="#">Logout</a>
</div>

<div class="main">
  <div class="header">
    <h1>Pending Updates</h1>
    <div class="search-box">
      <input type="text" placeholder="Search pending clients...">
    </div>
  </div>

  <div class="table-container">
    <form method="post" action="save_update.php">
      <table>
        <thead>
          <tr>
            <th>Client Name</th>
            <th>Type of Survey</th>
            <th>Current Status</th>
            <th>Remarks</th>
            <th>Last Update</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Sample row -->
          <tr>
            <td>Mary Joy De Leon</td>
            <td>Subdivision Survey</td>
            <td>
              <input type="text" name="status[]" value="Waiting for Signature">
            </td>
            <td>
              <input type="text" name="remarks[]" value="For pickup once signed">
            </td>
            <td>July 30, 2025</td>
            <td>
              <button type="submit" name="save[]" value="0" class="edit-btn">Save</button>
            </td>
          </tr>
          <tr>
            <td>Christian Dela Cruz</td>
            <td>Lot Relocation</td>
            <td>
              <input type="text" name="status[]" value="Needs Field Verification">
            </td>
            <td>
              <input type="text" name="remarks[]" value="Coordinate with field team">
            </td>
            <td>July 28, 2025</td>
            <td>
              <button type="submit" name="save[]" value="1" class="edit-btn">Save</button>
            </td>
          </tr>
          <!-- Add more rows dynamically using PHP and a database later -->
        </tbody>
      </table>
    </form>
  </div>
</div>

</body>
</html>
