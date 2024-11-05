<!-- I DIDN'T UNDERSTAND IF YOU WANT ME TO:
		1. PRESENT THE TABLE ON THE WEB
		2. INSERT THEM INTO THE DATABASE

		SO I DID BOTH OF THEM IN THIS FILE :)
		 -->

<?php 

	include('configDb.php');

	// SQL query for fetching all posts
	$query = "SELECT DATE(created_at) AS date, HOUR(created_at) AS hour, COUNT(*) AS post_count
				FROM posts
				GROUP BY DATE(created_at), HOUR(created_at)
				ORDER BY created_at ASC";

	// Database Class select
	$results = $db->select($query);

	foreach ($results as $result) {
		$date = $result['date'];
		$hour = $result['hour'];
		$count = $result['post_count'];

		// SQL query for inserting the data
		$query = "INSERT INTO post_count VALUES ('$date', $hour, $count)";

		// Database Class insert
		if ($db->insert($query)) {
	        echo "data has been inserted successfully<br/>";
	    }
	}



 ?>


 <!DOCTYPE html>
 <html>
	 <head>
	 	<meta charset="utf-8">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">
	 	<title>Post Amount Per Date and Hour</title>
	 </head>
	 <body class="font">
	    <div class="container">
	        <table border="1">
	            <thead>
	                <tr>
	                    <th>Date</th>
	                    <th>Hour</th>
	                    <th>Post Amount</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php foreach ($results as $result): ?>
	                    <tr>
	                        <td><?php echo htmlspecialchars($result['date']); ?></td>
	                        <td><?php echo htmlspecialchars($result['hour']); ?></td>
	                        <td><?php echo htmlspecialchars($result['post_count']); ?></td>
	                    </tr>
	                <?php endforeach; ?>
	            </tbody>
	        </table>
	    </div>
	</body>
 </html>