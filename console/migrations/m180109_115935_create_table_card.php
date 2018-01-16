<?php

use yii\db\Migration;

class m180109_115935_create_table_card extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%card}}', [
            'id' => $this->primaryKey(),
            'category' => $this->integer(1)->notNull(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text(),
            'show_on_main' => $this->integer(1)->notNull()->defaultValue(1),
        ], $tableOptions);
        
        $this->batchInsert('{{%card}}', ['category', 'title', 'text'], [
            [
                1,
                'Почему мы выбираем президента именно сейчас? Как часто в России выбирают президента?',
                '
                    Президентские выборы, которые назначены на 18 марта 2018 года, — седьмые по счету в истории России. По закону голосование проводится во второе воскресенье того же месяца, в который состоялись предыдущие выборы главы государства (это было 4 марта 2012 года). Но из-за того, что на вторую неделю марта приходится праздничный день — 8 марта, день голосования по закону был перенесен на третье воскресенье месяца.
                    Президента России с 2012 года выбирают на шесть лет.
                ',
            ],
            [
                1,
                'Кто может стать президентом?',
                '
                    Гражданин России не моложе 35 лет, постоянно проживающий в стране не меньше 10 лет.

                    Кандидат не должен иметь неснятую или непогашенную судимость за тяжкие или особо тяжкие преступления.

                    Не может быть избранным гражданин РФ, у которого есть иностранное гражданство, вид на жительство или другой документ, подтверждающий право на постоянное проживание на территории иностранного государства.

                    Один и тот же человек не может занимать должность главы государства больше двух сроков подряд.
                ',
            ],
            [
                1,
                'Кто имеет право голосовать?',
                '
                    Граждане России, которым ко дню голосования исполнилось 18 лет. Не могут голосовать люди, признанные судом недееспособными и находящиеся в местах лишения свободы по приговору суда. Это не касается подозреваемых и обвиняемых, которые находятся в следственных изоляторах временного содержания — СИЗО.

                    Как узнать больше о кандидатах?

                    Информация о претендентах на пост президента размещается в СМИ, на сайте Центризбиркома, на сайтах кандидатов и их партий, а также на специальных информационных стендах, в агитационных материалах.

                    Узнать больше о кандидатах можно на сайте TASS.RU. (ССЫЛКА)
                ',
            ],
            [
                1,
                'Сколько стоит избирательная кампания кандидатов? Кто за нее платит?',
                '
                    Кандидаты оплачивают все свои расходы на предвыборную гонку из специального избирательного фонда. Туда перечисляются только собственные деньги кандидата, средства его политической партии и пожертвования граждан, предпринимателей и компаний. Сумма всех расходов не может превышать 400 миллионов рублей.
                ',
            ],
            [
                1,
                'Что такое "день тишины"? Что запрещено в день голосования?',
                '
                    Днем тишины называют сутки перед днем голосования. Они начинаются с 00.00 часов по местному времени 17 марта. В эти сутки и в сам день голосования запрещена предвыборная агитация.

                    За пять дней перед днем голосования (с 13 марта) запрещено публиковать результаты опросов общественного мнения, прогнозы результатов выборов и тому подобные исследования, которые моделируют исход выборов. Он действует вплоть до закрытия 18 марта последних участков в Калининградской области.
                ',
            ],
            [
                1,
                'Кто и как наблюдает за выборами?',
                '
                    На избирательных участках могут присутствовать наблюдатели. Их вправе назначить каждый зарегистрированный кандидат, каждая политическая партия, выдвинувшая зарегистрированного кандидата.

                    Наблюдателям разрешено присутствовать при выдаче бюллетеней избирателям, наблюдать за подсчетом голосов, присутствовать при составлении протоколов об итогах голосования, а также при повторном подсчете голосов. Они имеют право вести в помещении для голосования фото- и видеосъемку, а удалять их с участка можно только по решению суда.

                    На выборах могут присутствовать иностранные наблюдатели, которые приглашены российскими органами власти, неправительственными организациями или частными лицами.

                    Работать на избирательных участках могут заранее аккредитованные журналисты, имеющие профессиональный стаж.

                    На выборах 2018 года впервые разрешено направлять в избирательные комиссии наблюдателей от Общественной палаты РФ и Общественных палат регионов. http://tass.ru/politika/4755531
                ',
            ],
            [
                1,
                'Можно ли посмотреть видеотрансляцию с участков?',
                '
                    На выборах в 2018 году предполагается установить больше 40 тыс. видеокамер на участках, где будет голосовать не меньше 80% избирателей. http://tass.ru/politika/4758899

                    Впервые система видеонаблюдения была применена в России на выборах главы государства весной 2012 года. Тогда было установлено почти 200 тыс. веб-камер на 91,7 тыс. участках. На каждом было смонтировано два устройства: одно транслировало общий вид помещения, другое показывало урну для голосования.

                    Изображение с избирательных участков будет транслироваться на специальном сайте. (Добавится ссылка).
                ',
            ],
            [
                1,
                'Как считают голоса?',
                '
                    Двумя способами: вручную и с помощью КОИБов — комплексов обработки избирательных бюллетеней. Автоматизированные системы обеспечивают быстрый и четкий подсчет голосов. Данные поступают в Государственную автоматизированную систему "Выборы" (ГАС "Выборы"), при этом снимается проблема доставки бюллетеней и протоколов из отдаленных и труднодоступных регионов.

                    На выборах 18 марта будет использоваться около 13 тысяч КОИБов, на них смогут проголосовать треть всех избирателей страны.

                    На остальных участках подсчет голосов ведется вручную. При изготовлении итоговых протоколов участковых избирательных комиссий будут применяться QR-коды — это вдвое ускоряет процесс ввода данных в ГАС "Выборы".
                ',
            ],
            [
                1,
                'Когда станут известны результаты выборов?',
                '
                    Предварительные результаты выборов обнародуются после закрытия всех участков, по мере их поступления в ЦИК.

                    По закону ЦИК РФ после проверки протоколов не позднее чем через 10 дней после дня голосования определяет результаты выборов. То есть, официальные результаты должны быть названы до 29 марта.
                ',
            ],
            [
                1,
                'Как определяют победителя?',
                '
                    Кандидат, который получит больше половины голосов избирателей, принявших участие в голосовании. Если больше 50% голосов не наберет ни один участник избирательной гонки, назначается второй тур выборов. В нем участвуют двое кандидатов, набравшие самый большой процент голосов в первом туре. Побеждает во втором туре тот кандидат, который наберет больше голосов.

                    По закону ЦИК РФ после проверки протоколов не позднее чем через 10 дней после дня голосования определяет результаты выборов. То есть, официальные результаты должны быть названы до 29 марта.
                '
            ],

            [
                2,
                'В какие часы открыты избирательные участки?',
                '
                    Голосование проводится с 8 до 20 часов по местному времени.

                    На участке, где голосуют избиратели, которые с 8 до 20 часов работают (посменно или на вахте), избирком может перенести начало голосования на более раннее время, но не более чем на два часа.
                ',
            ],
            [
                2,
                'Что делать, если меня нет в списке избирателей?',
                '
                    Для начала нужно уточнить, на тот ли вы пришли участок. Заранее узнать адрес своего участка можно на сайте Центральной избирательной комиссии. http://cikrf.ru/

                    Если вас нет в списке для голосования по месту жительства, вас туда должна включить участковая избирательная комиссия на основании паспорта с пропиской. В день голосования это должно быть сделано в течение двух часов с момента обращения, но не позднее окончания голосования.
                ',
            ],
            [
                2,
                'Что я увижу в избирательном бюллетене?',
                '
                    В бюллетене указываются в алфавитном порядке фамилии зарегистрированных кандидатов. На бланке содержатся имя и отчество каждого кандидата, год рождения, адрес, основное место работы или службы, занимаемая должность, выдвинут он политической партией или самовыдвиженец, данные о судимости.

                    Справа напротив каждого кандидата находится пустой квадрат, в котором нужно поставить любую отметку, чтобы проголосовать за данного кандидата.

                    Каждый бюллетень подписан двумя членами избиркома и содержит печать.
                ',
            ],
            [
                2,
                'Как получить и правильно заполнить избирательный бюллетень?',
                '
                    На участок нужно прийти с паспортом или заменяющим его документом. В особых случаях при голосовании не по месту жительства нужно взять также заявление с особой маркой.

                    Каждый избиратель имеет право получить один бюллетень. Чтобы отдать свой голос за кандидата, нужно в пустом квадратике напротив его данных поставить любой знак.

                    Недействительными считаются бюллетени, в которых нет отметок в квадратах напротив фамилий кандидатов или проставлено больше одной отметки. Такие бюллетени будут учитываться при подсчете общего количества голосов избирателей, но не будут засчитаны ни за одного из кандидатов.

                    Надписи или рисунки, сделанные избирателем на бюллетене за пределами клеточек для голосования, не имеют значения. Только знаки в квадратиках делают бюллетень действительным или недействительным.
                '
            ],
            [
                2,
                'Будет ли на выборах кандидат "против всех"?',
                '
                    Нет, такой графы в избирательном бюллетене не будет.
                ',
            ],
            [
                2,
                'Могу ли я попросить новый бюллетень, если допустил ошибку?',
                '
                    Если вы считаете, что неправильно заполнили бюллетень, вы можете попросить новый. Испорченный бланк особым образом помечается и погашается — у него отрезают левый нижний угол.
                '
            ],
            [   
                2,
                'Почему так важно проголосовать?',
                '
                    По закону никто не может принудить вас к участию или неучастию в выборах. Но именно в ваших интересах прийти на избирательный участок.

                    Отсутствие голоса не приравняется к графе "Против всех", которую убрали из бюллетеней еще в 2006 году. Это означает, что решение будет принято исходя из мнения проголосовавших. Поэтому если вы не примете участия в выборах, ваш голос просто пропадет.
                '
            ],
            [
                2,
                'А может ли кто-то принуждать меня голосовать определенным образом?',
                '
                    Нет. Участие в выборах является свободным и добровольным. Никто не вправе принуждать избирателя голосовать за кого-либо из кандидатов.
                '
            ],
            [
                2,
                'Может ли кто-то узнать, как я проголосовал?',
                '
                    Нет. Каждый избиратель голосует лично в кабине для тайного голосования, где нельзя находиться другим людям. Исключение может быть сделано для помощи инвалиду. Заполненный бюллетень избиратель опускает в опечатанный ящик для голосования или в аппарат для подсчета голосов.
                ',
            ],
            [
                2,
                'Разрешены ли опросы на выходе с избирательного участка?',
                '
                    Опрашивать выходящих с участка избирателей о том, как они проголосовали, не запрещено. Но публиковать результаты экзитполов (от англ. exitpoll — опрос на выходе) можно лишь после закрытия избирательных участков.
                '
            ],
            [
                2,
                'Что делать, если в день голосования я в отъезде? Взять открепительное удостоверение?',
                '            
                    <p>Нет, открепительные в 2017 году отменили. Теперь вам нужно подать в избирком специальное заявление, чтобы вас включили в список для голосования на участке в другом городе — там, где вы предполагаете в этот день находиться. Проголосовать можно на любом другом участке в стране.</p>
                    <h4>Заявление нужно подавать:</h4>
                    <div class="clearfix-box">
                        <div class="clearfix">
                            <div class="pull-left">
                                <p>С 31 января по 12 марта</p>
                            </div>
                            <div class="pull-right">
                                <p>в территориальную избирательную комиссию, в МФЦ или через портал госуслуг.</p>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="pull-left">
                                <p>С 25 февраля по 12 марта</p>
                            </div>
                            <div class="pull-right">
                                <p>в любой участковый избирком, в МФЦ или через портал госуслуг. В этом случае вас исключат из списка избирателей по месту жительства.</p>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="pull-left">
                                <p>С 13 марта по 17 марта до 14:00 по местному времени</p>
                            </div>
                            <div class="pull-right">
                                <p>заявление можно подать только лично в участковую избирательную комиссию по месту жительства. На ваше заявление поставят специальную марку. Она позволит вам проголосовать на специальном участке по месту пребывания. Там фрагмент этой марки отклеят и приклеят в списке избирателей, куда впишут ваши данные.</p>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <img src="/images/example/img.svg" alt="image title">
                    </div>
                '
            ],
            [
                2,
                'Что делать, если я попаду в больницу или в полицию?',
                '
                    В больницах и в СИЗО будут образованы свои участки. Туда нужно подать заявление о включении в список избирателей. Это можно сделать с 13 марта до 14:00 по местному времени 17 марта.
                '
            ],
            [
                2,
                'Что делать, если я буду на вокзале или в аэропорту?',
                '
                    Если вы знаете это заранее — подайте заявление о включении в список на созданном там участке. Если о поездке стало известно меньше, чем за 4 дня до выборов — оформите специальное заявление с защитной маркой в участковой комиссии по месту жительства не позднее 14:00 по местному времени 17 марта.
                ',
            ],
            [
                2,
                'Можно ли проголосовать досрочно?',
                '
                    Избиркомы могут проводить досрочное голосование, но не раньше, чем за 20 дней до дня выборов, на судах, которые в день голосования будут в плавании, на полярных станциях, в труднодоступных или отдаленных местностях. Досрочное голосование всех избирателей может быть проведено на отдельных избирательных участках за границей, но не раньше, чем за 15 дней до дня голосования.

                    Все остальные избиратели голосуют 18 марта.
                '
            ],
            [
                2,
                'Можно ли проголосовать дома по состоянию здоровья?',
                '
                    Можно. Для этого за 10 дней до голосования нужно подать письменное заявление или устно обратиться (в том числе при содействии других людей) в свою избирательную комиссию. Это можно сделать и позже, прием заявлений заканчивается за шесть часов до закрытия участков в день голосования.

                    Если комиссия признает причину, которую вы указали, уважительной (болезнь, инвалидность), то к вам направят сотрудников избиркома с бланками бюллетеней и переносным опечатанным ящиком для голосования.
                '
            ],
            [
                2,
                'Как проголосовать за границей?',
                '
                    За границей будут созданы свои участки для российских граждан. Обычно они располагаются в дипломатических учреждениях. Нужно прийти на такой участок до 8 марта и подать заявление. Непосредственно в день голосования избирателей будут включать в списки после устного обращения.
                '
            ],
            [
                2,
                'Какие еще выборы пройдут 18 марта 2018 года?',
                '
                    Местные референдумы. Например, жители Волгоградской области проголосуют на референдуме о введении местного времени. (Здесь будут уточнения и добавления).
                '
            ]
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%card}}');
    }
}
 
 
 
