<?php
// Fetch the data from the API
$URL = 'https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100';
$response = file_get_contents($URL);
$data = json_decode($response, true);
$records = $data['results'] ?? $data['records'] ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Nationality Data</title>
  <!-- Pico CSS from CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picocss@1.4.0/pico.min.css">
</head>
<body>

<h1>University of Bahrain Student Nationality Data</h1>

<table>
  <thead>
    <tr>
      <th>Year</th>
      <th>Semester</th>
      <th>Program</th>
      <th>Nationality</th>
      <th>College</th>
      <th>Number of Students</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($records as $record): ?>
      <tr>
      <td><?= $record['year'] ?? '' ?></td>
        <td><?= $record['semester'] ?? '' ?></td>
        <td><?= $record['the_programs'] ?? '' ?></td>
        <td><?= $record['nationality'] ?? '' ?></td>
        <td><?= $record['colleges'] ?? '' ?></td>
        <td><?= $record['students_count'] ?? '0' ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>

