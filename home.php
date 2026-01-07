<?php
include 'config.php';

$products = mysqli_query(
    $conn,
    "SELECT * FROM products WHERE status = 1 ORDER BY id DESC"
);
?>
<!DOCTYPE html>
<html lang="mn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online Shop</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
*{
    box-sizing:border-box;
    font-family:"Segoe UI",system-ui,sans-serif;
}
body{
    margin:0;
    background:#f3f4f6;
    color:#111;
}

/* ================= HERO SLIDER ================= */
.hero-slider{
    position:relative;
    width:100%;
    height:85vh;
    overflow:hidden;
}
.slide{
    position:absolute;
    inset:0;
    background-size:cover;
    background-position:center;
    opacity:0;
    transform:scale(1.05);
    transition:opacity 1.2s ease, transform 1.2s ease;
}
.slide.active{
    opacity:1;
    transform:scale(1);
}
.slide::after{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(
        rgba(0,0,0,.55),
        rgba(0,0,0,.55)
    );
}

/* HERO CONTENT */
.hero-content{
    position:absolute;
    inset:0;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    color:#fff;
    z-index:2;
}
.hero-content h1{
    font-size:48px;
    font-weight:900;
    letter-spacing:.6px;
    margin:0;
}
.hero-content p{
    font-size:18px;
    margin:20px 0 32px;
    opacity:.9;
}
.hero-btn{
    padding:14px 34px;
    border-radius:999px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:#fff;
    font-weight:700;
    text-decoration:none;
    font-size:15px;
}

/* SLIDER DOTS */
.dots{
    position:absolute;
    bottom:28px;
    left:50%;
    transform:translateX(-50%);
    display:flex;
    gap:10px;
    z-index:3;
}
.dot{
    width:10px;
    height:10px;
    border-radius:50%;
    background:rgba(255,255,255,.4);
    cursor:pointer;
}
.dot.active{
    background:#fff;
}

/* ================= PRODUCTS ================= */
.container{
    max-width:1300px;
    margin:0 auto;
    padding:70px 24px;
}
.section-title{
    text-align:center;
    font-size:26px;
    font-weight:800;
    margin-bottom:40px;
}
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
    gap:32px;
}
.card{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 18px 40px rgba(0,0,0,.08);
    transition:.3s;
}
.card:hover{
    transform:translateY(-8px);
}
.card img{
    width:100%;
    height:260px;
    object-fit:cover;
}
.card-body{
    padding:20px;
}
.card-body h4{
    margin:0 0 10px;
    font-size:16px;
    font-weight:700;
}
.price{
    font-size:18px;
    font-weight:900;
    margin-bottom:14px;
}
.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:12px;
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:#fff;
    font-weight:700;
}

/* FOOTER */
.footer{
    background:#fff;
    text-align:center;
    padding:30px;
    font-size:13px;
    color:#777;
}
</style>
</head>

<body>

<?php include 'header.php'; ?>

<!-- ================= HERO SLIDER ================= -->
<div class="hero-slider">

    <div class="slide active" style="background-image:url('https://images.unsplash.com/photo-1512436991641-6745cdb1723f');"></div>
    <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1521334884684-d80222895322');"></div>
    <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1491553895911-0055eca6402d');"></div>
    <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1519744792095-2f2205e87b6f');"></div>
    <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1542291026-7eec264c27ff');"></div>

    <div class="hero-content">
        <h1>Luxury Collection</h1>
        <p>Орчин үеийн, дээд зэрэглэлийн сонголт</p>
        <a href="#products" class="hero-btn">Бараа үзэх</a>
    </div>

    <div class="dots"></div>
</div>

<!-- ================= PRODUCTS ================= -->
<div class="container" id="products">
    <div class="section-title">Шинэ бараанууд</div>

    <div class="grid">
        <?php while($row=mysqli_fetch_assoc($products)): ?>
            <div class="card">
                <img src="uploaded_img/<?php echo $row['image']; ?>">
                <div class="card-body">
                    <h4><?php echo $row['name']; ?></h4>
                    <div class="price"><?php echo number_format($row['price']); ?> ₮</div>
                    <button class="btn">Сагслах</button>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<div class="footer">
    © <?php echo date('Y'); ?> Datacare ХХК · Дадлага ажил
</div>

<!-- ================= SLIDER SCRIPT ================= -->
<script>
const slides = document.querySelectorAll('.slide');
const dotsContainer = document.querySelector('.dots');
let index = 0;

// Create dots
slides.forEach((_, i) => {
    const dot = document.createElement('div');
    dot.classList.add('dot');
    if(i === 0) dot.classList.add('active');
    dot.onclick = () => showSlide(i);
    dotsContainer.appendChild(dot);
});

const dots = document.querySelectorAll('.dot');

function showSlide(i){
    slides[index].classList.remove('active');
    dots[index].classList.remove('active');

    index = i;

    slides[index].classList.add('active');
    dots[index].classList.add('active');
}

setInterval(() => {
    let next = (index + 1) % slides.length;
    showSlide(next);
}, 5000);
</script>

</body>
</html>
