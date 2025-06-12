// Array data produk
        const products = [
            {
                id: 1,
                name: "Smartphone Android Flagship",
                price: "Rp 8.999.000",
                category: "elektronik",
                description: "Smartphone terbaru dengan kamera 108MP dan prosesor flagship untuk performa maksimal.",
                image: "https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&h=300&fit=crop"
            },
            {
                id: 2,
                name: "Laptop Gaming RGB",
                price: "Rp 15.500.000",
                category: "elektronik",
                description: "Laptop gaming dengan performa tinggi, RAM 16GB dan GPU RTX untuk gaming experience terbaik.",
                image: "https://images.unsplash.com/photo-1525547719571-a2d4ac8945e2?w=400&h=300&fit=crop"
            },
            {
                id: 3,
                name: "Jaket Kulit Premium",
                price: "Rp 1.250.000",
                category: "fashion",
                description: "Jaket kulit asli dengan desain klasik dan kualitas premium untuk tampilan yang stylish.",
                image: "https://images.unsplash.com/photo-1521223890158-f9f7c3d5d504?w=400&h=300&fit=crop"
            },
            {
                id: 4,
                name: "Sepatu Sneakers Limited",
                price: "Rp 2.800.000",
                category: "fashion",
                description: "Sepatu sneakers limited edition dengan teknologi cushioning terdepan dan desain eksklusif.",
                image: "https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=300&fit=crop"
            },
            {
                id: 5,
                name: "Air Fryer Digital",
                price: "Rp 1.899.000",
                category: "rumah",
                description: "Air fryer dengan kontrol digital, kapasitas 5L untuk memasak makanan sehat tanpa minyak.",
                image: "https://images.unsplash.com/photo-1585515656973-78d70d9020ea?w=400&h=300&fit=crop"
            },
            {
                id: 6,
                name: "Robot Vacuum Cleaner",
                price: "Rp 3.500.000",
                category: "rumah",
                description: "Robot vacuum pintar dengan mapping technology dan kontrol via smartphone.",
                image: "https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=400&h=300&fit=crop"
            },
            {
                id: 7,
                name: "Sepeda Gunung Carbon",
                price: "Rp 12.000.000",
                category: "olahraga",
                description: "Sepeda gunung dengan frame carbon fiber, suspensi full dan komponen kelas professional.",
                image: "https://images.unsplash.com/photo-1544191696-15786d7fdd6d?w=400&h=300&fit=crop"
            },
            {
                id: 8,
                name: "Dumbbell Set Adjustable",
                price: "Rp 2.500.000",
                category: "olahraga",
                description: "Set dumbbell adjustable dengan bobot hingga 40kg per sisi, cocok untuk home gym.",
                image: "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=300&fit=crop"
            },
            {
                id: 9,
                name: "Smart Watch Series X",
                price: "Rp 4.200.000",
                category: "elektronik",
                description: "Smart watch dengan monitoring kesehatan lengkap, GPS dan battery life hingga 7 hari.",
                image: "https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400&h=300&fit=crop"
            },
            {
                id: 10,
                name: "Tas Backpack Travel",
                price: "Rp 850.000",
                category: "fashion",
                description: "Backpack travel multifungsi dengan compartment laptop, USB charging port dan rain cover.",
                image: "https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=300&fit=crop"
            },
            {
                id: 11,
                name: "Coffee Maker Espresso",
                price: "Rp 5.800.000",
                category: "rumah",
                description: "Mesin kopi espresso semi-automatic dengan steam wand dan pressure gauge profesional.",
                image: "https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=400&h=300&fit=crop"
            },
            {
                id: 12,
                name: "Matras Yoga Premium",
                price: "Rp 450.000",
                category: "olahraga",
                description: "Matras yoga dengan material natural rubber, anti-slip dan eco-friendly untuk latihan optimal.",
                image: "https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=400&h=300&fit=crop"
            }
        ];

        // Function untuk menampilkan produk
        function displayProducts(productsToShow) {
            const container = document.getElementById('products-container');
            container.innerHTML = '';

            productsToShow.forEach((product, index) => {
                const productCard = document.createElement('div');
                productCard.className = 'product-card';
                productCard.style.animationDelay = `${index * 0.1}s`;
                
                productCard.innerHTML = `
                    <img src="${product.image}" alt="${product.name}" class="product-image">
                    <div class="product-info">
                        <div class="product-category">${product.category}</div>
                        <h3 class="product-name">${product.name}</h3>
                        <p class="product-description">${product.description}</p>
                        <div class="product-price">${product.price}</div>
                        <button class="buy-button" onclick="buyProduct(${product.id})">
                            Beli Sekarang
                        </button>
                    </div>
                `;
                
                container.appendChild(productCard);
            });
        }

        // Function untuk filter produk
        function filterProducts(category) {
            let filteredProducts;
            
            if (category === 'all') {
                filteredProducts = products;
            } else {
                filteredProducts = products.filter(product => product.category === category);
            }
            
            displayProducts(filteredProducts);
        }

        // Function untuk membeli produk
        function buyProduct(productId) {
            const product = products.find(p => p.id === productId);
            alert(`Terima kasih! Anda telah memilih "${product.name}" dengan harga ${product.price}. Fitur checkout akan segera tersedia!`);
        }

        // Event listeners untuk filter buttons
        document.addEventListener('DOMContentLoaded', function() {
            // Tampilkan semua produk saat pertama kali load
            displayProducts(products);
            
            // Event listener untuk filter buttons
            const filterButtons = document.querySelectorAll('.filter-btn');
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Filter products
                    const filterValue = this.getAttribute('data-filter');
                    filterProducts(filterValue);
                });
            });

            // Search functionality
            const searchBox = document.querySelector('.search-box');
            searchBox.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const filteredProducts = products.filter(product => 
                    product.name.toLowerCase().includes(searchTerm) ||
                    product.description.toLowerCase().includes(searchTerm) ||
                    product.category.toLowerCase().includes(searchTerm)
                );
                displayProducts(filteredProducts);
            });

            // Smooth scrolling untuk navigation
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
 