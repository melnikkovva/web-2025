document.addEventListener('DOMContentLoaded', function() {
    function initSliders() {
        const sliders = document.querySelectorAll('.post-images-slider');
        
        sliders.forEach(slider => {
            const container = slider.querySelector('.slider-container');
            const track = slider.querySelector('.slider-track');
            const items = slider.querySelectorAll('.slider-item');
            const prevBtn = slider.querySelector('.slider-prev');
            const nextBtn = slider.querySelector('.slider-next');
            const counter = slider.querySelector('.slider-counter');
            
            if (!items || items.length === 0) return;
            
            // Ждём загрузки изображений перед расчётом ширины
            const img = items[0].querySelector('img');
            if (img && !img.complete) {
                img.addEventListener('load', () => updateSlider());
            }
            
            let itemWidth = slider.offsetWidth; // Используем ширину слайдера
            let currentIndex = 0;
            
            function updateSlider() {
                itemWidth = slider.offsetWidth; // Обновляем ширину на случай ресайза
                const offset = -currentIndex * itemWidth;
                track.style.transform = `translateX(${offset}px)`;
                
                if (counter) {
                    counter.textContent = `${currentIndex + 1}/${items.length}`;
                }
            }
            
            // Для одного изображения скрываем элементы управления
            if (items.length <= 1) {
                if (prevBtn) prevBtn.style.display = 'none';
                if (nextBtn) nextBtn.style.display = 'none';
                if (counter) counter.style.display = 'none';
                return;
            }
            
            // Обработчики для кнопок
            if (prevBtn) {
                prevBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    currentIndex = (currentIndex - 1 + items.length) % items.length;
                    updateSlider();
                });
            }
            
            if (nextBtn) {
                nextBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    currentIndex = (currentIndex + 1) % items.length;
                    updateSlider();
                });
            }
            
            // Инициализация
            updateSlider();
            
            // Ресайз окна
            window.addEventListener('resize', updateSlider);
        });
    }
    
    // Инициализация при загрузке
    initSliders();
    
    // Если посты подгружаются динамически, вызывайте initSliders() после их добавления
});