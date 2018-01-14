<?php

use yii\db\Migration;

class m180109_195935_create_table_calendar extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%calendar}}', [
            'id' => $this->primaryKey(),
            'date' => $this->integer()->notNull(),
            'date_to' => $this->integer(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text(),
        ], $tableOptions);
        
        $this->batchInsert('{{%calendar}}', ['date', 'date_to', 'title', 'text'], [
            [
                strtotime('2017-12-18'),
                null,
                'Начало избирательной кампании',
                '<ul>
                    <li>Начало избирательной кампании.</li>
                    <li>Политические партии получают возможность проводить съезды для выдвижения кандидата, а группы избирателей — собрания для поддержки самовыдвиженца.</li>
                    <li>Начинает работу информационно-справочный центр ЦИК России 8-800-707-2018.</li>
                </ul>'
            ],
            [
                strtotime('2017-12-20'),
                strtotime('2017-12-25'),
                'Предвыборные съезды партий',
                '<ul>
                    <li>В этот период прошли предвыборные съезды парламентских партий — "Единой России", КПРФ, "Справедливой России" и ЛДПР. КПРФ выдвинула кандидатом в президенты директора подмосковного предприятия "Совхоз имени Ленина" Павла Грудинина, ЛДПР — главу высшего совета партии Владимира Жириновского. "Единая Россия" и "Справедливая Россия" приняли решение поддержать кандидатуру действующего президента Владимира Путина, который идет на выборы в качестве самовыдвиженца.</li>
                    <li>Прошли также съезды некоторых непарламентских партий. Партия роста утвердила кандидатом уполномоченного при президенте РФ по защите прав предпринимателей Бориса Титова, "Яблоко" — основателя партии Григория Явлинского. "Коммунисты России" выдвинули лидера партии Максима Сурайкина, "Гражданская инициатива" — телеведущую Ксению Собчак.</li>
                </ul>'
            ],
            [
                strtotime('2017-12-27'),
                null,
                'ЦИК начинает принимать документы для регистрации кандидатов',
                '<ul>
                    <li>ЦИК начинает принимать документы для регистрации кандидатов. После подачи документов у ЦИК есть пять дней на то, чтобы проверить их. После выдвижения и открытия специального избирательного счета в Сбербанке кандидаты могут начинать предвыборную агитацию. (КАРТОЧКА №5)</li>
                </ul>'
            ],
            [
                strtotime('2018-01-07'),
                null,
                'Истекает срок для выдвижения кандидатов-самовыдвиженцев',
                '<ul>
                    <li>ЦИК начинает принимать документы для регистрации кандидатов. После выдвижения кандидат может начинать сбор подписей. Избиратель может поставить подпись в поддержку только одного человека. ЦИК принимает подписные листы от кандидатов до 31 января.</li>
                </ul>'
            ],
            [
                strtotime('2018-01-12'),
                null,
                'Истекает срок выдвижения кандидатов от политических партий',
                '<ul>
                    <li>Истекает срок выдвижения кандидатов от политических партий. После выдвижения кандидат может начинать сбор подписей. От сбора подписей освобождены кандидаты от парламентских партий — "Единой России", КПРФ, "Справедливой России" и ЛДПР. Избиратель может поставить подпись в поддержку только одного человека. ЦИК принимает подписные листы от кандидатов до 31 января.</li>
                </ul>'
            ],
            [
                strtotime('2018-01-31'),
                null,
                'ЦИК прекращает принимать документы для регистрации кандидатов',
                '<ul>
                    <li>С 18.00 ЦИК прекращает принимать документы для регистрации кандидатов.</li>
                    <li>Также с этого дня избиратели могут подать заявление в ТИК, в МФЦ или через портал госуслуг, если они намерены голосовать не по месту регистрации, а по месту пребывания. (КАРТОЧКА № 21)</li>
                </ul>'
            ],
            [
                strtotime('2018-02-10'),
                null,
                'Истекает срок принятия решений о регистрации кандидатов',
                '<ul>
                    <li>Решение о регистрации кандидата либо об отказе в регистрации принимается в течение 10 дней после подачи документов в ЦИК. После этого в течение суток о нем сообщают кандидату с мотивировкой.</li>
                </ul>'
            ],
            [
                strtotime('2018-02-17'),
                null,
                'Начало предвыборной агитации в СМИ',
                '<ul>
                    <li>Начало предвыборной агитации в СМИ.</li>
                    <li>Бесплатное эфирное время будет предоставляться зарегистрированным кандидатам на каналах общероссийских и региональных государственных теле- и радиоканалов по рабочим дням с 17 февраля до 17 марта.</li>
                </ul>'
            ],
            [
                strtotime('2018-02-25'),
                null,
                'Все участки начинают прием заявлений для голосования не по прописке',
                '<ul>
                    <li>Все избирательные участки начинают прием заявлений для голосования не по прописке. (КАРТОЧКА №21)</li>
                    <li>Также, начиная с этого дня может проводиться досрочное голосование для сотрудников полярных станций, экипажей судов, которые 18 марта будут в плавании, жителей труднодоступных и удаленных районов. (КАРТОЧКА №24)</li>
                </ul>'
            ],
            [
                strtotime('2018-03-02'),
                null,
                'Начинается досрочное голосование за пределами РФ',
                '<ul>
                    <li>Начиная с этого дня может проводиться досрочное голосование на избирательных участках за пределами России. (КАРТОЧКА №24)</li>
                    <li>По предварительным оценкам ЦИК, таких участков будет 218. Обычно они располагаются в дипломатических учреждениях. (КАРТОЧКА №26)</li>
                </ul>'
            ],
            [
                strtotime('2018-03-07'),
                null,
                'Истекает срок публикации программ партий, выдвинувших кандидата',
                '<ul>
                    <li>Истекает срок публикации предвыборных программ партий, выдвинувших кандидата</li>
                    <li>С этого дня граждане могут изучить избирательные списки, сформированные на участках</li>
                </ul>'
            ],
            [
                strtotime('2018-03-08'),
                null,
                'Начало приема заявлений для голосования на дому',
                '<ul>
                    <li>Участковые комиссии начинают прием заявлений для голосования на дому (КАРТОЧКА №25)</li>
                    <li>Также в этот день истекает срок подачи заявлений для россиян, которые хотят проголосовать за границей. (КАРТОЧКА №26)</li>
                </ul>'
            ],
            [
                strtotime('2018-03-12'),
                null,
                'Истекает срок, когда кандидат может отозвать свою кандидатуру с выборов',
                '<ul>
                    <li>Последний день, когда кандидат может отозвать свою кандидатуру с выборов, а партии могут отозвать выдвинутых ими кандидатов.</li>
                    <li>Также в этот день ТИК, МФЦ и портал госуслуг прекращают прием заявлений от избирателей о голосовании не по месту жительства. Теперь подать специальное заявление можно только в участковую комиссию по месту регистрации. (КАРТОЧКА №21)</li>
                </ul>'
            ],
            [
                strtotime('2018-03-13'),
                null,
                'Вступает в силу запрет на публикацию результатов соцопросов и прогнозов',
                '<ul>
                    <li>Вступает в силу запрет на публикацию результатов соцопросов и прогнозов на результаты выборов.</li>
                    <li>Также с этого дня начинается оформление специальных заявлений для голосования не по прописке. (КАРТОЧКА №21)</li>
                </ul>'
            ],
            [
                strtotime('2018-03-17'),
                null,
                '"День тишины"',
                '<ul>
                    <li>В "День тишины" прекращается предвыборная агитация в СМИ, запрещена любая предвыборная агитация. Под запрет не подпадают печатные агитационные материалы, размещенные ранее в специальных местах или на рекламных конструкциях.</li>
                </ul>'
            ],
            [
                strtotime('2018-03-18'),
                null,
                'Выборы президента РФ',
                '<ul>
                    <li>Выборы президента РФ. С 8:00 до 20:00 по местному времени проходит голосование.</li>
                    <li>С 21:00 перестает действовать запрет на публикацию результатов соцопросов и прогнозов, связанных с результатами выборов.</li>
                    <li>После 21:00 предварительные данные о результатах выборов обнародуются по мере их поступления в ЦИК. (КАРТОЧКА №10)</li>
                </ul>'
            ],
            [
                strtotime('2018-03-20'),
                null,
                'Крайний срок подведения итогов выборов ТИКами',
                '<ul>
                    <li>Территориальные избирательные комиссии подводят итоги выборов и подписывают протоколы о результатах голосования.</li>
                    <li>Данные протоколов участковых избирательных комиссий публикуются в интернете.</li>
                    <li>Прекращает работу информационно-справочный центр ЦИК России 8-800-707-2018.</li>
                </ul>'
            ],
            [
                strtotime('2018-03-22'),
                null,
                'Крайний срок подведения итогов выборов в субъектах РФ',
                '<ul>
                    <li>Завершается подведение итогов голосования на территории субъектов РФ. Избирательные комиссии субъектов подписывают протоколы об итогах голосования.</li>
                </ul>'
            ],
            [
                strtotime('2018-03-29'),
                null,
                'Крайний срок утверждения итогов выборов',
                '<ul>
                    <li>До этой даты ЦИК должен утвердить итоги выборов. После подписания протокола о результатах выборов и сводной таблицы его копии выдаются представителям СМИ.</li>
                </ul>'
            ],
            [
                strtotime('2018-04-01'),
                null,
                'Крайний срок публикации результатов выборов',
                '<ul>
                    <li>К этому дню результаты выборов должны быть опубликованы в региональных и федеральных государственных СМИ.</li>
                </ul>'
            ],
            [
                strtotime('2018-05-07'),
                null,
                'Инаугурация (если победитель выявляется в первом туре)',
                '<ul>
                    <li>Если победитель выявляется в первом туре, в этот день состоится инаугурация избранного президента.</li>
                    <li>Если ни один участник избирательной гонки не наберет больше 50% голосов избирателей, пришедших на участки, назначается второй тур выборов. (КАРТОЧКА №11)</li>
                </ul>'
            ],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%calendar}}');
    }
}
 
 
 
