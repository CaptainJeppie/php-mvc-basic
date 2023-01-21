<?php
require __DIR__ . '/../repositories/UserRepositroy.php';
class LoginService
{
    public function getAll() {
        $repository = new UserRepositroy();
        return $repository->getAll();
    }

    public function getById(mixed $id)
    {
        $repository = new UserRepositroy();
        return $repository->getById($id);
    }

    public function chekUser(mixed $email, mixed $password)
    {
        $repository = new UserRepositroy();
        $users = $repository->getAll();
        foreach ($users as $user) {
            if ($user['email'] == $email && password_verify($password, $user['password'])) {
                return true;
            }
            if ($user['email'] == $email && $user['password'] == $password) {
                return true;
            }
        }
        return false;
    }

    public function addUser(mixed $name, mixed $email, mixed $phoneNumber, mixed $password)
    {
        $repository = new UserRepositroy();
        $repository->addUser($name, $email, $phoneNumber, $password);
    }

    public function editUser(mixed $id, mixed $name, mixed $email, mixed $phoneNumber, mixed $password)
    {
        $repository = new UserRepositroy();
        $repository->editUser($id, $name, $email, $phoneNumber, $password);
    }

    public function deleteUser(mixed $id)
    {
        $repository = new UserRepositroy();
        $repository->deleteUser($id);
    }

    public function insert(User $user)
    {
        $repository = new UserRepositroy();
        $repository->addUser($user->getName(), $user->getEmail(), $user->getPhoneNumber(), $user->getPassword());
    }

}