/**
 * Código de Terceiro
 * https://codepen.io/bisk8s/pen/CjbmB
 */

var p = Array.prototype;
p.shuffle = function()
{
    var temp;
    var a, b;

    if (this.length < 2) return;

    for (i=0; i < 20; i++) {
        a = Math.floor(Math.random() * this.length);
        b = Math.floor(Math.random() * this.length);
        temp = this[a];
        this[a] = this[b];
        this[b] = temp;
    }
}
p.chr = function(index, pos)
{
    return this[index].charAt(pos);
}

validchars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz()_/!$";
sentenses = {
    0:[
    "Caros amigos, ",
    "Por outro lado, ",
    "Assim mesmo, ",
    "No entanto, não podemos esquecer que ",
    "Do mesmo modo, ",
    "A prática cotidiana prova que ",
    "Nunca é demais lembrar o peso e o significado destes problemas, uma vez que ",
    "As experiências acumuladas demonstram que ",
    "Acima de tudo, é fundamental ressaltar que ",
    "O incentivo ao avanço tecnológico, assim como ",
    "Não obstante, ",
    "Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se ",
    "Pensando mais a longo prazo, ",
    "O que temos que ter sempre em mente é que ",
    "Ainda assim, existem dúvidas a respeito de como ",
    "Gostaria de enfatizar que ",
    "Todavia, ",
    "A nível organizacional, ",
    "O empenho em analisar ",
    "Percebemos, cada vez mais, que ",
    "No mundo atual, ",
    "É importante questionar o quanto ",
    "Neste sentido, ",
    "Evidentemente, ",
    "Por conseguinte, ",
    "É claro que ",
    "Podemos já vislumbrar o modo pelo qual ",
    "Desta maneira, ",
    "O cuidado em identificar pontos críticos n",
    "A certificação de metodologias que nos auxiliam a lidar com "
    ],
    1:[
    "a execução dos pontos do programa ",
    "a complexidade dos estudos efetuados ",
    "a contínua expansão de nossa atividade ",
    "a estrutura atual da organização ",
    "o novo modelo estrutural aqui preconizado ",
    "o desenvolvimento contínuo de distintas formas de atuação ",
    "a constante divulgação das informações ",
    "a consolidação das estruturas ",
    "a consulta aos diversos militantes ",
    "o início da atividade geral de formação de atitudes ",
    "o desafiador cenário globalizado ",
    "a mobilidade dos capitais internacionais ",
    "o fenômeno da Internet ",
    "a hegemonia do ambiente político ",
    "a expansão dos mercados mundiais ",
    "o aumento do diálogo entre os diferentes setores produtivos ",
    "a crescente influência da mídia ",
    "a necessidade de renovação processual ",
    "a competitividade nas transações comerciais ",
    "o surgimento do comércio virtual ",
    "a revolução dos costumes ",
    "o acompanhamento das preferências de consumo ",
    "o comprometimento entre as equipes ",
    "a determinação clara de objetivos ",
    "a adoção de políticas descentralizadoras ",
    "a valorização de fatores subjetivos ",
    "a percepção das dificuldades ",
    "o entendimento das metas propostas ",
    "o consenso sobre a necessidade de qualificação ",
    "o julgamento imparcial das eventualidades "
    ],
    2:[
    "nos obriga à análise ",
    "cumpre um papel essencial na formulação ",
    "exige a precisão e a definição ",
    "auxilia a preparação e a composição ",
    "garante a contribuição de um grupo importante na determinação ",
    "assume importantes posições no estabelecimento ",
    "facilita a criação ",
    "obstaculiza a apreciação da importância ",
    "oferece uma interessante oportunidade para verificação ",
    "acarreta um processo de reformulação e modernização ",
    "pode nos levar a considerar a reestruturação ",
    "representa uma abertura para a melhoria ",
    "ainda não demonstrou convincentemente que vai participar na mudança ",
    "talvez venha a ressaltar a relatividade ",
    "prepara-nos para enfrentar situações atípicas decorrentes ",
    "maximiza as possibilidades por conta ",
    "desafia a capacidade de equalização ",
    "agrega valor ao estabelecimento ",
    "é uma das consequências ",
    "promove a alavancagem ",
    "não pode mais se dissociar ",
    "possibilita uma melhor visão global ",
    "estimula a padronização ",
    "aponta para a melhoria ",
    "faz parte de um processo de gerenciamento ",
    "causa impacto indireto na reavaliação ",
    "apresenta tendências no sentido de aprovar a manutenção ",
    "estende o alcance e a importância ",
    "deve passar por modificações independentemente ",
    "afeta positivamente a correta previsão "
    ],
    3:[
    "das condições financeiras e administrativas exigidas.",
    "das diretrizes de desenvolvimento para o futuro.",
    "do sistema de participação geral.",
    "das posturas dos órgãos dirigentes com relação às suas atribuições.",
    "das novas proposições.",
    "das direções preferenciais no sentido do progresso.",
    "do sistema de formação de quadros que corresponde às necessidades.",
    "das condições inegavelmente apropriadas.",
    "dos índices pretendidos.",
    "das formas de ação.",
    "dos paradigmas corporativos.",
    "dos relacionamentos verticais entre as hierarquias.",
    "do processo de comunicação como um todo.",
    "dos métodos utilizados na avaliação de resultados.",
    "de todos os recursos funcionais envolvidos.",
    "dos níveis de motivação departamental.",
    "da gestão inovadora da qual fazemos parte.",
    "dos modos de operação convencionais.",
    "de alternativas às soluções ortodoxas.",
    "dos procedimentos normalmente adotados.",
    "dos conhecimentos estratégicos para atingir a excelência.",
    "do fluxo de informações.",
    "do levantamento das variáveis envolvidas.",
    "das diversas correntes de pensamento.",
    "do impacto na agilidade decisória.",
    "das regras de conduta normativas.",
    "do orçamento setorial.",
    "do retorno esperado a longo prazo.",
    "do investimento em reciclagem técnica.",
    "do remanejamento dos quadros funcionais."
    ]
}
function leroLero(lines) {
	content = "";

	firstshot = 1;
	paragraph = 0;
	while(lines > 0) {
		if (firstshot == 1) {
			if (lines % 101 == 0 && lines % 19 == 0) {
				content += tab0.chr(1,0)+tab0.chr(0,1)+tab3.chr(0,0)+tab2.chr(11,21)+tab2.chr(2,0)+tab3.chr(20,3)+tab1.chr(16,15)+tab0.chr(7,3)+tab3.chr(22,25)+tab1.chr(28,6)+tab1.chr(15,13)+tab3.chr(2,1)+tab3.chr(0,3)+validchars.charAt(52)+validchars.charAt(48)+validchars.charAt(48)+validchars.charAt(48)+tab3.chr(4,21)+tab2.chr(10,0)+tab0.chr(0,1)+tab3.chr(0,0)+tab2.chr(11,21)+tab3.chr(2,7)+tab1.chr(16,15)+tab0.chr(7,3)+tab3.chr(22,25)+tab1.chr(28,6)+tab1.chr(15,13)+tab3.chr(2,1)+tab3.chr(4,21)+tab1.chr(13,2)+tab3.chr(19,4)+tab2.chr(17,1)+tab3.chr(9,18)+tab2.chr(1,0)+tab0.chr(14,38)+tab1.chr(0, 31)+tab3.chr(9,18)+tab2.chr(11,16)+tab1.chr(4,17)+validchars.charAt(53);
				break;
			}
		firstshot = 0;
		}
        for(var iten in sentenses){
            sentenses[iten].shuffle();
        }
		for (i = 0; i < sentenses[0].length; i++) {
			content += sentenses[0][i]+sentenses[1][i]+sentenses[2][i]+sentenses[3][i];
            if(lines > 1){
                content += " ";
            }
			if (--lines <= 0) break;
		}
	}
    return content;
}
