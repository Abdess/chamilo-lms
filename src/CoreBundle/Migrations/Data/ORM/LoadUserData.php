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
 * Class LoadUserData
 * @package Chamilo\CoreBundle\Migrations\Data\ORM
 */
class LoadUserData extends AbstractFixture implements
    ContainerAwareInterface,
    OrderedFixtureInterface,
    VersionedFixtureInterface
{
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
        return 6;
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
        $groupManager = $this->getGroupManager();
        //$faker = $this->getFaker();

        $criteria = ['code' => 'student'];
        $studentGroup = $groupManager->findGroupBy($criteria);
        $criteria = ['code' => 'teacher'];
        $teacherGroup = $groupManager->findGroupBy($criteria);

        // Loading test users
        // @todo add setting in installer to load sample content

        $root = $this->container->get('kernel')->getRealRootDir();
        $dataUserFile = $root.'/tests/datafiller/data_users.php';

        $accessUrl = $this->getAccessUrlManager()->find(1);

        if (file_exists($dataUserFile)) {
            //$users = require $dataUserFile;
            $users = false;
            if (!empty($users)) {
                foreach ($users as $userData) {
                    /** @var User $user */
                    $user = $manager->createUser();

                    $accessUrlRelUser = new AccessUrlRelUser();
                    $accessUrlRelUser->setUser($user);
                    $accessUrlRelUser->setPortal($accessUrl);

                    $user->setPortal($accessUrlRelUser);
                    $user->setFirstname($userData['firstname']);
                    $user->setLastname($userData['lastname']);
                    $user->setUsername($userData['username']);
                    $user->setEmail($userData['email']);
                    $user->setPlainPassword($userData['pass']);
                    $user->setEnabled(true);
                    $user->setLocked(false);

                    if ($userData['status'] == 5) {
                        $user->addGroup($studentGroup);
                    } else {
                        $user->addGroup($teacherGroup);
                    }
                    $manager->updateUser($user);
                }
            }
        }


        // Creating random student users using faker
        /*
        foreach (range(3, 100) as $id) {
            $user = $manager->createUser();
            $user->setUserId($id);
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            //$user->setPhone($faker->phoneNumber);
            $user->setUsername($faker->userName);
            $user->setEmail($faker->safeEmail);
            $user->setPlainPassword($faker->randomNumber());
            $user->setEnabled(true);
            $user->setLocked(false);
            $user->addGroup($studentGroup);
            $manager->updateUser($user);
        }*/
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
