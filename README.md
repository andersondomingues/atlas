DESCRIÇÃO DOS ARQUIVOS:

a) /atlas_distrib_anderson.tar.gz
Arquivo que contém a distribuição da atlas com o algoritmo ODD-EVEN implementados. O VDHL gerado implementa o algoritmo corretamente,
porém a simulação não funciona dentro da ferramenta, pois a origem dos pacotes não é gerada corretamente. Pode-se mudar a origem dos pacotes nos arquivos gerados e simular externamente, utilizando o script gerado pela ferramenta.

b) /exemplo_simulate.do
Exemplo de script com a linha de force para simular a indisponibilidade de uma certa rota. O algoritmo de roteamento utiliza um array chamado AVAIL para controlar quais rotas são possíveis para enviar pacotes. Quando utilizamos o force em alguma rota, o algoritmo utiliza a proxima rota disponível. Se o algoritmo gerou apenas uma rota (casos onde não há adaptatividade), os pacotes não serão roteados.

c) /exemplo_simulate_linux
Arquivo que simula um certo tráfego e mostra a rota tomada em formato ascii. Este arquivo deve substituir o arquivo gerado pela ferramenta atlas, substituindo o valor da variável TRAFFIC (dentro do arquivo) pelo nome dado ao tráfego gerado pela ferramenta. Também, junto com este, deve estar o script "ascii.php", responsável por mostrar a rota em formato ascii no terminal.

d) /ascii.php
Arquivo que mostra uma matriz que representa a noc simulada, apontando quais roteadores receberam tráfego. Para isto, utiliza dos arquivos da pasta "Traffic/$$$/Out/", onde $$$ representa o nome do tráfego utilizado. Este script não precisa ser invocado, pois é utilizado pelo script de simulação (exemplo_simulate_linux).


COMO SIMULAR UMA ROTA UTILIZANDO OS SCRIPTS
a) Gerar uma NoC utilizando a ferramenta atlas. Gerar também um scenery de tráfego.
b) Copiar os scripts "exemplo_simulate_linux" e "ascii.php" para a pasta do projeto gerado.
c) Para simular sem falhas (re-rotas), execute o script "exemplo_simulate_linux", substituindo o valor da variável TRAFFIC (dentro do arquivo) pelo nome do tráfego gerado.
d) Para simular com falha, adicione a linha de force no arquivo "simulate.do". Para desabilitar a porta SOUTH do roteador 0804 (x=8, y=4), utilize a seguinte linha de comando.
  
  force -freeze sim:/topnoc/NOC/Router0804/SwitchControl/auxfree(3) 0 0


NOTAS
a) Deve simular uma vez sem a linha de force e outra com, para visualizar a adaptatividade do algorito.
b) A linha force deve ser adicionada apenas para roteadores que gerariam mais de uma rota possível. Por exemplo, não se deve bloquear roteadores que possuem o mesmo Y (eixo vertical) do roteador de destino, pois isso faz com que o pacote não seja mais roteado.
c) Todas as rotas WEST e EAST possuem ao menos outra rota alternativa. Logo, podem ser testadas qualquer combinação de novo, livremente, desde que a origem não possui o mesmo Y do destino.

