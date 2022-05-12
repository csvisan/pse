<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510162144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $students = [
            ["name" => "Bogdan Remus-Cristian", "link" => "/bogdan-remus-cristian", "picture" => "/BogdanRemusCristian/images/brc.jpg"],
            ["name" => "Moga Amadeus", "link" => "/moga-amadeus", "picture" => "/MogaAmadeus/img/moga.jpg"],
            ["name" => "Barz Geanina", "link" => "/barz-geanina", "picture" => "/BarzGeanina/images/barz_geanina.jpeg"],
            ["name" => "Budiu Cristiana-Roxana", "link" => "/cristiana-roxana", "picture" => "/CristianaRoxana/personal.png"],
            ["name" => "Popa Denis", "link" => "/popa-denis", "picture" => "/PopaDenis/img/Img.jpg"],
            ["name" => "Groza Marius", "link" => "/marius_groza", "picture" => "/marius_groza/imagini/me.jpg"],
            ["name" => "Qumseya Ibrahim", "link" => "/qumseyaIbrahim", "picture" => "/QumseyaIbrahim/images/img.jpg"],
            ["name" => "Anca Adrian", "link" => "#", "picture" => "/uploads/placeholder.png"],
            ["name" => "Sas Ana-Maria", "link" => "#", "picture" => "/uploads/placeholder.png"],
            ["name" => "Creștin Alexandru", "link" => "#", "picture" => "/uploads/placeholder.png"],
            ["name" => "Boca Cătălina", "link" => "#", "picture" => "/uploads/placeholder.png"],
            ["name" => "Mantoiu Daniela", "link" => "#", "picture" => "/uploads/placeholder.png"],
            ["name" => "Mantoiu Daniela", "link" => "#", "picture" => "/uploads/placeholder.png"],
            ["name" => "Baciu Mihai", "link" => "#", "picture" => "/uploads/placeholder.png"],
            ["name" => "Muntean Alin", "link" => "#", "picture" => "/uploads/placeholder.png"],
            ["name" => "Puia Rodica-Daniela", "link" => "#", "picture" => "/uploads/placeholder.png"],
        ];
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255), link VARCHAR(255), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        foreach ($students as $student) {
            $this->addSql("INSERT INTO student (name, link, picture) VALUES ('" . $student['name'] . "','" . $student['link'] . "','" . $student['picture'] . "')");
        }
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
