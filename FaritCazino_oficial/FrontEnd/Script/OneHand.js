document.getElementById("spin").addEventListener("click", function() {
    const fruits = ["🍎", "🍋", "🍊", "🍒", "🍉", "🍇"];
    
    
    // Генерируем случайные фрукты для каждого слота
    const slot1 = fruits[Math.floor(Math.random() * fruits.length)];
    const slot2 = fruits[Math.floor(Math.random() * fruits.length)];
    const slot3 = fruits[Math.floor(Math.random() * fruits.length)];
    
    // Обновим содержимое слотов
    document.getElementById("slot1").textContent = slot1;
    document.getElementById("slot2").textContent = slot2;
    document.getElementById("slot3").textContent = slot3;
    
    // Проверим результат
    if (slot1 === slot2 && slot2 === slot3) {
        document.getElementById("result").textContent = "Поздравляем! Вы выиграли!";
    } else {
        document.getElementById("result").textContent = "Попробуйте снова.";
    }
});