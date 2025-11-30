<?php
$primary_color = ERROR_PRIMARY_COLOR;
$darker_color = ERROR_DARKER_COLOR;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>DB Error</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		:root {
			--primary-color: <?php echo $primary_color; ?>;
			--darker-color: <?php echo $darker_color; ?>;
		}

		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		body {
			font-family: 'Poppins', sans-serif;
			background: linear-gradient(135deg, var(--primary-color), var(--darker-color));
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			color: #fff;
			padding: 20px;
			text-align: center;
		}

		.container {
			background: rgba(255, 255, 255, 0.1);
			padding: 40px 30px;
			border-radius: 20px;
			box-shadow: 0 8px 40px rgba(0, 0, 0, 0.3);
			backdrop-filter: blur(14px);
			-webkit-backdrop-filter: blur(14px);
			max-width: 1000px;
			width: 100%;
			animation: fadeIn 0.8s ease;
		}

		.emoji {
			font-size: 4.5rem;
			animation: float 2s ease-in-out infinite;
		}

		.error-code {
			font-size: 4rem;
			font-weight: 700;
			margin: 10px 0;
			color: rgba(255, 255, 255, 0.85);
		}

		.heading {
			margin-bottom: 10px;
			word-wrap: break-word;
			background: #ececec;
			color: #1e1e1e;
			border-radius: 40px;
		}

		.heading div,
		.message div {
			border-radius: 40px !important;
			padding: 20px !important;
		}

		.message {
			font-size: 1rem;
			margin-bottom: 30px;
			line-height: 1.6;
			word-wrap: break-word;
			background: #ececec;
			color: #1e1e1e;
			border-radius: 40px;
		}

		.btn {
			display: inline-block;
			margin: 8px;
			padding: 12px 28px;
			border-radius: 30px;
			background: rgba(255, 255, 255, 0.2);
			color: #fff;
			text-decoration: none;
			font-weight: 600;
			border: 1px solid rgba(255, 255, 255, 0.3);
			transition: all 0.3s ease;
		}

		.btn:hover {
			background: rgba(255, 255, 255, 0.35);
			transform: scale(1.05);
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: translateY(20px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}

		@keyframes float {
			0% {
				transform: translateY(0px);
			}

			50% {
				transform: translateY(-10px);
			}

			100% {
				transform: translateY(0px);
			}
		}

		/* Responsive Design */
		@media (max-width: 768px) {
			.emoji {
				font-size: 3.5rem;
			}

			.error-code {
				font-size: 3rem;
			}

			.message {
				font-size: 0.95rem;
			}

			.btn {
				padding: 10px 20px;
				font-size: 0.95rem;
			}
		}

		@media (max-width: 480px) {
			.container {
				padding: 30px 20px;
			}

			.emoji {
				font-size: 3rem;
			}

			.error-code {
				font-size: 2.5rem;
			}

			.message {
				font-size: 0.9rem;
			}

			.btn {
				display: block;
				width: 100%;
				margin: 10px 0;
			}
		}
	</style>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="emoji">😕</div>
		<div class="heading"><?php echo $heading; ?></div>
		<div class="message"><?php echo $message; ?></div>
		<a href="javascript:history.back()" class="btn">&larr; Go Back</a>
		<a href="<?php echo config_item('base_url'); ?>" class="btn">🏠 Home</a>
	</div>
</body>

</html>