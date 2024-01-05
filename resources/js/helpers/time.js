export function formatTime(timeInSeconds){
    const days = Math.floor(timeInSeconds / (60 * 60 * 24));
    const hours = Math.floor((timeInSeconds % (60 * 60 * 24)) / (60 * 60));
    const minutes = Math.floor((timeInSeconds % (60 * 60)) / 60);
    const seconds = timeInSeconds % 60;

    let daysString = '';

    if (days !== 0){
        daysString = `${zeroPrefix(days, 2)}:`;
    }

    return daysString + `${zeroPrefix(hours, 2)}` +
        `:${zeroPrefix(minutes, 2)}` +
        `:${zeroPrefix(seconds, 2)}`;
}

function zeroPrefix(num, digit){
    let zero = '';
    for(let i = 0; i < digit; i++) {
        zero += '0';
    }
    return (zero + num).slice(-digit);
}

