

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>About Developer</title>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,300italic,400italic,600italic,700italic,800italic'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700'>
<style>
      body {
	height: 100%;
	width: 100%;
}

.gb-col-xl-5 {
	padding: 50px;
}

.gb-section {
	height: 100vh;
	width: 100%;
	position: static;
}

.gb-row {
	margin-left: 0px;
	margin-right: 0px;
}

.gb-fit {
	background-size: cover;
	width: 100%;
	background-position: center bottom;
	background-image: url("{{ asset('img/developer.jpg') }}");
}

.gb-fit-1 {
	height: 100vh;
}

.gb-display-1 {
	text-transform: uppercase;
	font-family: Oswald, sans-serif;
	font-size: 42px;
	letter-spacing: 18px;
	font-weight: 700;
}

.gb-heading-one {
	text-transform: uppercase;
	font-family: "Open Sans", sans-serif;
	font-weight: 300;
	font-size: 23px;
	letter-spacing: 3px;
}

.gb-lead {
	font-family: "Open Sans", sans-serif;
	font-size: 20px;
	padding-top: 20px;
	padding-bottom: 20px;
}

.gb-green {
	color: rgb(4, 142, 148);
	font-family: "Open Sans", sans-serif;
}

.gb-btn {
	background-color: rgb(9, 8, 8);
	border-radius: 0px;
	text-transform: uppercase;
	letter-spacing: 1px;
}

.gb-btn:hover {
	background-color: rgb(26, 21, 21);
}

.gb-btn-rounded {
	border-radius: 50%;
	height: 50px;
	width: 50px;
}

@media only screen and (max-width: 500px) {
	.gb-fit {
		background-size: cover;
		height: 60vh;
		width: 100%;
		background-position: left center;
	}
	.gb-display-1 {
		font-size: 32px;
		letter-spacing: 4px;
	}
	.gb-heading-one,
	.gb-heading-two {
		font-size: 20px;
	}
	.gb-lead {
		font-size: 16px;
	}
	.gb-btn-rounded {
		height: 40px;
		width: 40px;
		padding: 3px;
	}
	.gb-col-xl-5 {
		padding: 30px 10px;
		margin-left: auto;
		margin-right: auto;
		text-align: center;
	}
}

@media only screen and (max-width: 768px) {
	.gb-fit {
		background-size: cover;
		width: 100%;
		background-position: center bottom;
		height: 100vh !important;
	}
	.gb-display-1 {
		font-size: 32px;
		letter-spacing: 4px;
	}
	.gb-heading-one,
	.gb-heading-two {
		font-size: 1.8rem !important;
	}
	.gb-lead {
		font-size: 16px;
	}
}

.gb-gb-green {
	text-transform: uppercase;
}

.gb-gb-green-1 {
	letter-spacing: 1px;
}

.gb-gb-green-2 {
	letter-spacing: 2px;
}

.gridbox-badge {
    font-family: 'Open Sans', sans-serif;
    font-size: 14px;
    letter-spacing: 2px;
    margin-bottom: 0 !important;
    line-height: 0 !important;
    font-weight: 600;
    color: #fff;
    padding: 8px;
    position: fixed !important;
    display: inline-block !important;
    visibility: visible !important;
    z-index: 2147483647 !important;
    top: auto !important;
    right: 18px !important;
    bottom: 3px !important;
    left: auto !important;
    color: #fff !important;
    background: #191c1e;
    background: linear-gradient(to right, #191c1e, #191c1f);
    border-radius: 3px !important;
    padding: 8px !important;
    opacity: 1 !important;
    line-height: 14px !important;
    text-decoration: none !important;
    transform: none !important;
    margin: 0 !important;
    width: auto !important;
    height: auto !important;
    overflow: visible !important;
    white-space: nowrap;
    -webkit-box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
}
    </style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
    <section class="gb-section">
        <div class="row gb-row">
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 col-12 gb-fit"> </div>
            <div class="col-xl-7 col-lg-7 col-md-6 col-sm-6 col-12 gb-col-xl-5">
            <h1 class="display-1 gb-display-1">I'M <span class="gb-green">MORTEZA</span></h1>
            <h1 class="gb-heading-one">PHP Developer <span class="gb-green">&amp;</span> Medical Student</h1>
            <p class="lead gb-lead">I am from badroud and study medical in yazd now. I'm 23 years old.&nbsp;</p>
            <h2 class="gb-green gb-heading-two gb-gb-green gb-gb-green-1 gb-gb-green-2">Objective</h2>
            <p class="lead gb-lead">I want to become a good doctor and also developer.&nbsp;</p> <a href="https://alphablog.ir" class="btn btn-lg btn-dark gb-btn">Visit My Site</a>
            <hr> <a href="#" class="gb-btn-rounded btn-inverse btn btn-dark btn-lg gb-btn"><i class="fa fa-facebook"></i></a> <a href="#" class="gb-btn-rounded btn-inverse btn btn-dark btn-lg gb-btn"><i class="fa fa-twitter"></i></a> <a href="#" class="gb-btn-rounded btn-inverse btn btn-dark btn-lg gb-btn"><i class="fa fa-linkedin-square"></i></a> <a href="#" class="gb-btn-rounded btn-inverse btn btn-dark btn-lg gb-btn"><i class="fa fa-instagram"></i></a> <a href="#" class="gb-btn-rounded btn-inverse btn btn-dark btn-lg gb-btn"><i class="fa fa-google-plus"></i></a> </div>
        </div>
    </section>
</body>
</html>
