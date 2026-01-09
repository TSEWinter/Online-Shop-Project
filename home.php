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

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    
    <link rel="stylesheet" href="/Online-Shop-Project/css/style.css">

</head>

<body>
    <?php include 'header.php'; ?>
    <div class="hero-slider">
        <div class="slide active" style="background-image:url('https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=1600');"></div>
        <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1521334884684-d80222895322?auto=format&fit=crop&w=1600');"></div>
        <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=1600');"></div>
        <div class="slide" style="background-image:url('https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=1600');"></div>

        <div class="hero-content">
        </div>
    </div>
    <section class="new-section">
        <h2 class="section-title">Шинэ бараанууд</h2>
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
    <section class="products-section">
        <div class="products-container">
            <h2 class="section-title">Бараанууд</h2>

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
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('.slide');
            let index = 0;
            setInterval(() => {
                slides[index].classList.remove('active');
                index = (index + 1) % slides.length;
                slides[index].classList.add('active');
            }, 5000);
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
    <?php include 'footer.php'; ?>
    <script src="js/script.js"></script>


</body>

</html>