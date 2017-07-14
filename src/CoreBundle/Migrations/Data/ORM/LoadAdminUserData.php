<?php
/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Migrations\Data\ORM;

use Chamilo\CoreBundle\Entity\AccessUrlRelUser;
use Chamilo\UserBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Oro\Bundle\MigrationBundle\Fixture\VersionedFixtureInterface;

/**
 * Class LoadAdminUserData
 * @package Chamilo\CoreBundle\Migrations\Data\ORM
 */
class LoadAdminUserData extends AbstractFixture implements
    ContainerAwareInterface,
    OrderedFixtureInterface,
    VersionedFixtureInterface
{
    const DEFAULT_ADMIN_USERNAME = 'admin';
    const DEFAULT_ADMIN_EMAIL = 'admin@example.com';

    /** @var ContainerInterface */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function getVersion()
    {
        return '2.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 3;
    }

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $manager = $this->getUserManager();
        $admin = $manager->find(1);

        if (empty($admin)) {
            // Creating admin user.
            /** @var User $admin */
            $admin = $manager->createUser();

            $accessUrl = $this->getAccessUrlManager()->find(1);

            $accessUrlRelUser = new AccessUrlRelUser();
            $accessUrlRelUser->setUser($admin);
            $accessUrlRelUser->setPortal($accessUrl);

            $admin->setPortal($accessUrlRelUser);

            $admin->setUsername('admin');
            $admin->setUserId(1);
            $admin->setStatus(1); // teacher
            $admin->setFirstname('Jane');
            $admin->setLastname('Doe');
            $admin->setEmail('admin@example.org');
            $admin->setPlainPassword('admin');
            $admin->setEnabled(true);
            $admin->setSuperAdmin(true);
            $admin->setLocked(false);
        }

        // Reference added in LoadGroupData.php
        $group = $this->getReference('group_admin');
        $admin->setGroups(array($group));

        $manager->updateUser($admin);
    }

    /**
     * @return \FOS\UserBundle\Model\UserManagerInterface
     */
    public function getUserManager()
    {
        return $this->container->get('fos_user.user_manager');
    }

    /**
     * @return \FOS\UserBundle\Entity\GroupManager
     */
    public function getGroupManager()
    {
        return $this->container->get('fos_user.group_manager');
    }

    /**
     * @return \Chamilo\CoreBundle\Entity\Manager\AccessUrlManager
     */
    public function getAccessUrlManager()
    {
        return $this->container->get('chamilo_core.manager.access_url');
    }

    /**
     * @return \Faker\Generator
     */
    public function getFaker()
    {
        return $this->container->get('faker.generator');
    }
}
