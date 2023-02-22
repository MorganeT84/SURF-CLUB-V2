<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222103940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE session_level (session_id INT NOT NULL, level_id INT NOT NULL, INDEX IDX_419774C5613FECDF (session_id), INDEX IDX_419774C55FB14BA7 (level_id), PRIMARY KEY(session_id, level_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE session_level ADD CONSTRAINT FK_419774C5613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_level ADD CONSTRAINT FK_419774C55FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session ADD spot_id INT DEFAULT NULL, ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D42DF1D37C FOREIGN KEY (spot_id) REFERENCES spot (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D412469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_D044D5D42DF1D37C ON session (spot_id)');
        $this->addSql('CREATE INDEX IDX_D044D5D412469DE2 ON session (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session_level DROP FOREIGN KEY FK_419774C5613FECDF');
        $this->addSql('ALTER TABLE session_level DROP FOREIGN KEY FK_419774C55FB14BA7');
        $this->addSql('DROP TABLE session_level');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D42DF1D37C');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D412469DE2');
        $this->addSql('DROP INDEX IDX_D044D5D42DF1D37C ON session');
        $this->addSql('DROP INDEX IDX_D044D5D412469DE2 ON session');
        $this->addSql('ALTER TABLE session DROP spot_id, DROP category_id');
    }
}
