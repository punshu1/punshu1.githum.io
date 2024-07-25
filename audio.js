document.addEventListener('DOMContentLoaded', function() {
  const audio = new Audio('music.mp3');
  audio.volume = 0.2; // Громкость по умолчанию 10%
  audio.loop = true; // Зацикливаем музыку
  audio.play();

  const volumeUp = document.createElement('button');
  volumeUp.innerText = '+';
  volumeUp.style.position = 'fixed';
  volumeUp.style.top = '10px';
  volumeUp.style.left = '10px';
  volumeUp.addEventListener('click', function() {
    if (audio.volume < 1) {
      audio.volume = Math.min(audio.volume + 0.1, 1);
    }
  });
  document.body.appendChild(volumeUp);

  const volumeDown = document.createElement('button');
  volumeDown.innerText = '-';
  volumeDown.style.position = 'fixed';
  volumeDown.style.top = '10px';
  volumeDown.style.left = '40px';
  volumeDown.addEventListener('click', function() {
    if (audio.volume > 0) {
      audio.volume = Math.max(audio.volume - 0.1, 0);
    }
  });
  document.body.appendChild(volumeDown);
});
