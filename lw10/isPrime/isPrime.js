function isPrime(num) {
      
    for (let i = 2, max = Math.sqrt(num); i <= max; i++) {
        if (num % i === 0) {
            return false;
        }
    }
    return true;
}

function printPrimeStatus(number) {
    if (!Number.isInteger(number)) {
        console.log(number + ' - не является целым числом');
    } else if (number < 2) {
        console.log(number + ' - не простое число (меньше 2)');
    } else {
        console.log(number + ' - ' + (isPrime(number) ? 'простое' : 'не простое') + ' число');
    }
}

function checkInput(input) {
    if (typeof input === 'number') {
        printPrimeStatus(input);
    } else if (Array.isArray(input)) {
        input.forEach(num => {
            if (typeof num === 'number') {
                printPrimeStatus(num);
            } else {
                console.log(num + ' - не число');
            }
        });
    } else {
        console.log('Введите число или массив чисел');
    }
}

checkInput(3);   
checkInput(4);    
checkInput([3, 4, 5]); 
checkInput('абв'); 
checkInput(0);   
checkInput(1);    
checkInput(-5);   
checkInput(2.5); 
checkInput([7, 'текст', 9.3]); 
checkInput({});