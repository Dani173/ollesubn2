<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190519173608 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE exercise (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, series INT NOT NULL, repetitions INT NOT NULL, duration VARCHAR(255) NOT NULL, multimedia VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exercise_routine (exercise_id INT NOT NULL, routine_id INT NOT NULL, INDEX IDX_91E32F93E934951A (exercise_id), INDEX IDX_91E32F93F27A94C7 (routine_id), PRIMARY KEY(exercise_id, routine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musclegroups (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musclegroups_exercise (musclegroups_id INT NOT NULL, exercise_id INT NOT NULL, INDEX IDX_DF9FD991DBE3A538 (musclegroups_id), INDEX IDX_DF9FD991E934951A (exercise_id), PRIMARY KEY(musclegroups_id, exercise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exercise_routine ADD CONSTRAINT FK_91E32F93E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE exercise_routine ADD CONSTRAINT FK_91E32F93F27A94C7 FOREIGN KEY (routine_id) REFERENCES routine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE musclegroups_exercise ADD CONSTRAINT FK_DF9FD991DBE3A538 FOREIGN KEY (musclegroups_id) REFERENCES musclegroups (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE musclegroups_exercise ADD CONSTRAINT FK_DF9FD991E934951A FOREIGN KEY (exercise_id) REFERENCES exercise (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE exercise_routine DROP FOREIGN KEY FK_91E32F93E934951A');
        $this->addSql('ALTER TABLE musclegroups_exercise DROP FOREIGN KEY FK_DF9FD991E934951A');
        $this->addSql('ALTER TABLE musclegroups_exercise DROP FOREIGN KEY FK_DF9FD991DBE3A538');
        $this->addSql('DROP TABLE exercise');
        $this->addSql('DROP TABLE exercise_routine');
        $this->addSql('DROP TABLE musclegroups');
        $this->addSql('DROP TABLE musclegroups_exercise');
    }
}
