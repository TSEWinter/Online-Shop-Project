<?php
include 'config.php';
session_start();

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

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* ===== RESET ===== */
        * {
            box-sizing: border-box;
            font-family: "Segoe UI", system-ui, sans-serif
        }

        body {
            margin: 0;
            background: #f3f4f6;
            color: #111
        }

        /* ===== HERO SLIDER ===== */
        .hero-slider {
            position: relative;
            height: 85vh;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transform: scale(1.08);
            transition: opacity 1.2s ease, transform 1.2s ease;
        }

        .slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .slide::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(rgba(0, 0, 0, .55), rgba(0, 0, 0, .55));
        }

        .hero-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: 900
        }

        .hero-content p {
            font-size: 18px;
            margin-top: 16px
        }

        /* ===== SECTION TITLE ===== */
        .section-title {
            text-align: center;
            font-size: 28px;
            font-weight: 900;
            margin-bottom: 50px;
        }

        /* ===== NEW ITEMS ===== */
        .new-section {
            padding: 100px 20px;
            background: #f5f6fa;
        }

        .new-grid {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 32px;
        }

        .new-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, .12);
        }

        .new-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        /* SCROLL EFFECT */
        .reveal {
            opacity: 0;
            transform: translateY(80px) scale(.9);
            transition: all 1s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        /* ===== PRODUCTS ===== */
        .products-section {
            padding: 100px 20px;
        }

        .products-container {
            max-width: 1300px;
            margin: 0 auto;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 32px;
        }

        .card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(0, 0, 0, .08);
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-6px)
        }

        .card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .card-body h4 {
            margin: 0 0 10px;
            font-size: 16px;
            font-weight: 700;
        }

        .price {
            font-size: 18px;
            font-weight: 900;
            margin-bottom: 14px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            font-weight: 700;
            cursor: pointer;
        }

        /* ===== FOOTER ===== */
        .site-footer {
            background: #fff;
            text-align: center;
            padding: 35px 20px;
            font-size: 14px;
            color: #666;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>

<body>
    <!-- Header section -->
    <?php include 'header.php'; ?>

    <!-- ===== LUXURY COLLECTION ===== -->
    <div class="hero-slider">
        <div class="slide active" style="background-image:url('https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=1600');"></div>
        <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1521334884684-d80222895322?auto=format&fit=crop&w=1600');"></div>
        <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=1600');"></div>
        <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1600');"></div>

        <div class="hero-content">
            <h1>Luxury Collection</h1>
            <p>Дээд зэрэглэлийн загвар, технологи</p>
        </div>
    </div>

    <!-- ===== NEW ITEMS ===== -->
    <section class="new-section">
        <h2 class="section-title">✨ Шинэ бараанууд</h2>
        <div class="new-grid">
            <div class="new-card reveal"><img src="https://th.bing.com/th/id/R.493fce528011e4136d073c8b6c747b77?rik=cp%2bFq2OwQvR4AQ&riu=http%3a%2f%2fwww.modern-notoriety.com%2fwp-content%2fuploads%2f2018%2f05%2fnike-air-force-1-100-aq3621-111-2.jpg&ehk=50KOjjNQHNSEHBKCTvU1eUxgq6SselcNXnqN7EDO0JM%3d&risl=&pid=ImgRaw&r=0"></div>
            <div class="new-card reveal"><img src="https://tse1.mm.bing.net/th/id/OIP.ZW6fAIOT0Q-8FY9xEBNMywHaJQ?cb=defcachec2&rs=1&pid=ImgDetMain&o=7&rm=3"></div>
            <div class="new-card reveal"><img src="https://images.unsplash.com/photo-1542060748-10c28b62716f?auto=format&fit=crop&w=800"></div>
            <div class="new-card reveal"><img src="https://tse1.mm.bing.net/th/id/OIP.JbBQYCEhxzxzkG_qMeQ9WwHaHa?cb=defcachec2&rs=1&pid=ImgDetMain&o=7&rm=3"></div>
            <div class="new-card reveal"><img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=800"></div>
            <div class="new-card reveal"><img src="https://images.iconfigurators.app/images/wheels/xlarge/KF002-Aristo-26x16-8x170-Polished-(4)-1000_2971.png"></div>
            <div class="new-card reveal"><img src="https://assets.adidas.com/images/w_1880,f_auto,q_auto/c87749bc2db8494c94a4c14aa3718d38_9366/IZ4801_21_model.jpg"></div>
            <div class="new-card reveal"><img src="https://tse2.mm.bing.net/th/id/OIP.UATIPfQpyNUfknO8ss9kFwHaHa?cb=defcachec2&rs=1&pid=ImgDetMain&o=7&rm=3"></div>
        </div>
    </section>

    <!-- ===== PRODUCTS ===== -->
    <section class="products-section">
        <div class="products-container">
            <h2 class="section-title">🔥 Бараанууд</h2>

            <div class="grid">
                <?php while ($row = mysqli_fetch_assoc($products)): ?>
                    <div class="card">
                        <img src="uploaded_img/<?php echo $row['image']; ?>" alt="">
                        <div class="card-body">
                            <h4><?php echo $row['name']; ?></h4>
                            <div class="price"><?php echo number_format($row['price']); ?> ₮</div>
                            <button class="btn"><i class="fa fa-cart-plus"></i> Сагслах</button>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer class="site-footer">
        © 2026 Datacare ХХК · Дадлага ажил
    </footer>

    <!-- ===== SCRIPTS ===== -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            /* SLIDER */
            const slides = document.querySelectorAll('.slide');
            let index = 0;
            setInterval(() => {
                slides[index].classList.remove('active');
                index = (index + 1) % slides.length;
                slides[index].classList.add('active');
            }, 5000);

            /* SCROLL REVEAL */
            const reveals = document.querySelectorAll('.reveal');

            function handleScroll() {
                const trigger = window.innerHeight * 0.85;
                reveals.forEach(el => {
                    const top = el.getBoundingClientRect().top;
                    if (top < trigger && top > 0) {
                        el.classList.add('active');
                    } else {
                        el.classList.remove('active');
                    }
                });
            }
            window.addEventListener('scroll', handleScroll);
            handleScroll();
        });
    </script>

    <!-- footer section -->
    <?php include 'footer.php'; ?>


</body>

</html>