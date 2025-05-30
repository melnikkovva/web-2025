document.addEventListener('DOMContentLoaded', function() {
    const sliders = document.querySelectorAll('.post-images-slider');
    
    sliders.forEach(slider => {
        const container = slider.querySelector('.slider-container');
        const items = slider.querySelectorAll('.slider-item');
        const prevBtn = slider.querySelector('.slider-prev');
        const nextBtn = slider.querySelector('.slider-next');
        const counter = slider.querySelector('.slider-counter');
        
        if (items.length <= 1) {
            if (prevBtn && nextBtn) {
                prevBtn.style.display = 'none';
                nextBtn.style.display = 'none';
            }
            return;
        }
        
        let currentIndex = 0;
        const itemWidth = items[0].clientWidth;
        
        function updateSlider() {
            container.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
            if (counter) {
                counter.textContent = `${currentIndex + 1}/${items.length}`;
            }
        }
        
        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                updateSlider();
            });
            
            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % items.length;
                updateSlider();
            });
        }
        
        // Инициализация
        container.style.display = 'flex';
        container.style.transition = 'transform 0.3s ease';
        updateSlider();
    });
});