<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Survey Files | Titulo</title>
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
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Titulo</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="client_requests.php">Client Requests</a>
    <a href="survey_files.php">Survey Files</a>
    <a href="client_updates.php">Client Updates</a>
    <a href="pending_updates.php">Pending Updates</a>
    <a href="settings.php">Settings</a>
    <a href="index.php">Logout</a>
  </div>

  <div class="main">
    <div class="header">
      <h1>Survey Files</h1>
      <div class="search-box">
        <input type="text" placeholder="Search transactions...">
      </div>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Client Name</th>
            <th>Survey Type</th>
            <th>Location</th>
            <th>Status</th>
            <th>Date Submitted</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // Placeholder data – replace with actual database fetch later
            $surveyFiles = [
              ["Angelica Ramos", "Lot Survey", "Marcos Village", "Completed", "July 31, 2025"],
              ["Daniel Cruz", "Relocation Survey", "Camp 7", "In Progress", "July 30, 2025"],
              ["Ana Lopez", "Site Verification", "La Trinidad", "Pending", "July 29, 2025"]
            ];

            foreach ($surveyFiles as $file) {
              echo "<tr>";
              foreach ($file as $value) {
                echo "<td>$value</td>";
              }
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
