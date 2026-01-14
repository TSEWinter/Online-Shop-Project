<aside class="sidebar">

     <div class="header">
          <a href="#" class="logo">Online Shop</a>
          <div id="side-toggle" class="fas fa-angle-left"></div>
     </div>

     <nav class="sidebar-nav">

          <a href="dashboard.php" class="sidebar-link">
               <i class="fas fa-home"></i>
               <span>Dashboard</span>
          </a>

          <a href="product.php" class="sidebar-link">
               <i class="fas fa-box"></i>
               <span>Бараа</span>
          </a>

          <a href="admin_orders.php" class="sidebar-link">
               <i class="fas fa-shopping-bag"></i>
               <span>Захиалга</span>
          </a>

          <a href="admin_users.php" class="sidebar-link">
               <i class="fas fa-users"></i>
               <span>Хэрэглэгч</span>
          </a>

          <a href="../admin.php" class="sidebar-link logout">
               <i class="fas fa-sign-out-alt"></i>
               <span>Гарах</span>
          </a>

     </nav>


</aside>

<style>
     /* 1. Үндсэн Sidebar */
     .sidebar {
          width: 250px;
          background: #111827;
          /* Таны сонгосон хар өнгө */
          height: 100vh;
          position: fixed;
          left: 0;
          top: 0;
          padding: 20px;
          box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
          transition: all 0.4s ease;
          /* Зөөлөн хөдөлгөөн */
          z-index: 100;
          overflow-x: hidden;
     }

     /* 2. Толгой хэсэг (Header) */
     .sidebar .header {
          display: flex;
          align-items: center;
          justify-content: space-between;
          margin-bottom: 30px;
          padding-bottom: 20px;
          border-bottom: 1px solid rgba(255, 255, 255, 0.1);
     }

     .sidebar .logo {
          color: #fff;
          font-size: 24px;
          font-weight: bold;
          text-decoration: none;
          white-space: nowrap;
          /* Текстийг доош нь унагахгүй */
     }

     /* Нээж хаах товч */
     #side-toggle {
          color: #fff;
          font-size: 20px;
          cursor: pointer;
          width: 35px;
          height: 35px;
          line-height: 35px;
          text-align: center;
          background: rgba(255, 255, 255, 0.1);
          border-radius: 5px;
          transition: 0.3s;
     }

     #side-toggle:hover {
          background: #3b82f6;
          /* Цэнхэр өнгө */
     }

     /* 3. Цэсний загвар */
     .sidebar-nav {
          display: flex;
          flex-direction: column;
          gap: 5px;
     }

     .sidebar-link {
          display: flex;
          align-items: center;
          padding: 12px 15px;
          color: rgba(255, 255, 255, 0.7);
          text-decoration: none;
          transition: 0.3s;
          border-radius: 8px;
          white-space: nowrap;
     }

     .sidebar-link i {
          min-width: 30px;
          /* Icon-ы өргөнийг тогтмол байлгах */
          font-size: 18px;
          text-align: center;
     }

     .sidebar-link:hover,
     .sidebar-link.active {
          background: #3b82f6;
          /* Идэвхтэй үеийн цэнхэр */
          color: white;
     }

     .sidebar-link.logout {
          margin-top: 50px;
          color: #ff8888;
     }

     .sidebar-link.logout:hover {
          background: rgba(255, 0, 0, 0.1);
          color: #ff4444;
     }

     /* -------------------------------------------
       4. ХААГДСАН ҮЕИЙН ЗАГВАР (Sidebar Closed) 
       ------------------------------------------- */

     /* Жижгэрсэн өргөн */
     .sidebar.close {
          width: 80px;
          padding: 20px 10px;
          /* Зайг багасгана */
     }

     /* Текстүүдийг нуух */
     .sidebar.close .logo,
     .sidebar.close .sidebar-link span {
          opacity: 0;
          pointer-events: none;
          display: none;
     }

     /* Товчлуурыг эргүүлэх */
     .sidebar.close #side-toggle {
          transform: rotate(180deg);
          width: 100%;
          /* Төвд нь байрлуулах */
     }

     /* Icon-уудыг голлуулах */
     .sidebar.close .sidebar-link {
          justify-content: center;
     }

     .sidebar.close .sidebar-link i {
          margin: 0;
     }

     /* -------------------------------------------
       5. Үндсэн агуулга (Main Content) хөдөлгөх
       ------------------------------------------- */
     /* Таны үндсэн div-ийн class-ыг энд бичнэ. Жишээ нь: .main-content */
     body {
          transition: margin-left 0.4s ease;
     }

     /* Sidebar нээлттэй үед */
     body.active-sidebar {
          margin-left: 250px;
     }

     /* Sidebar хаалттай үед */
     body.collapsed-sidebar {
          margin-left: 80px;
     }
</style>

<script>
     let sideToggle = document.querySelector('#side-toggle');
     let sidebar = document.querySelector('.sidebar');
     let body = document.querySelector('body');

     // Хэрэглэгчийн сонголтыг хадгалах (Optional)
     if (localStorage.getItem('sidebar') === 'close') {
          sidebar.classList.add('close');
          body.classList.add('collapsed-sidebar');
     } else {
          body.classList.add('active-sidebar');
     }

     sideToggle.onclick = () => {
          sidebar.classList.toggle('close');

          // Body margin-ийг өөрчлөх
          if (sidebar.classList.contains('close')) {
               body.classList.remove('active-sidebar');
               body.classList.add('collapsed-sidebar');
               localStorage.setItem('sidebar', 'close'); // Сонголтыг санах
          } else {
               body.classList.remove('collapsed-sidebar');
               body.classList.add('active-sidebar');
               localStorage.setItem('sidebar', 'open');
          }
     }
</script>