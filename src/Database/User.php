<?php
namespace Group8\Spyke\Database;

class User extends \Group8\Spyke\Database
{
    public const USER_MIN = 3;
    public const USER_MAX = 16;
    public const PASS_MIN = 8;
    public const PASS_MAX = 128;

    // Setters
    public function registerUser(string $username, $password, string $first, string $last)
    {
        if (!$this->getID($username)) {
            // No user with that username exists. Proceed.
            $data = [
                "username" => $username,
                "id" => null,
                "pass" => password_hash($password, PASSWORD_DEFAULT),
                "firstName" => $first,
                "lastName" => $last,
            ];
            $sql = "INSERT INTO users (username, id, pass, firstName, lastName)
					VALUES (:username, :id, :pass, :firstName, :lastName)";
            return $this->prepare($sql)->execute($data);
        } else {
            // User already exists. Failure.
            return false;
        }
    }

    public function setGender(int $id, int $gender)
    {
        // Sets a user's gender
        $data = [
            "id" => $id,
            "gender" => $gender,
        ];
        $sql = "UPDATE users SET gender = :gender WHERE id = :id";
        return $this->prepare($sql)->execute($data);
    }

    public function setImage(int $id, \GdImage $image)
    {
        // Converts the GdImage to a WebP image and stores it in the database.
		ob_start();
		imagewebp($image, null, 80);
		$webp = ob_get_clean();
        $data = [
            "id" => $id,
            "image" => $webp
        ];
        $sql = "UPDATE users SET image = :image WHERE id = :id";
        if ($this->prepare($sql)->execute($data)) {
			// Success
			return true;
		} else {
			// Failure
			return false;
		}
    }

    public function setBio(int $id, string $about)
    {
        $data = [
            "id" => $id,
            "about" => $about,
        ];
        $sql = "UPDATE users SET about = :about WHERE id = :id";
        return $this->prepare($sql)->execute($data);
    }
    public function setFirstName(int $id, string $firstName)
    {
        $data = [
            "id" => $id,
            "firstName" => $firstName,
        ];
        $sql = "UPDATE users SET about = :firstName WHERE id = :id";
        return $this->prepare($sql)->execute($data);
    }
    public function setLastName(int $id, string $lastName)
    {
        $data = [
            "id" => $id,
            "lastName" => $lastName,
        ];
        $sql = "UPDATE users SET about = :lastName WHERE id = :id";
        return $this->prepare($sql)->execute($data);
    }
    public function setLocation(int $id, string $location)
    {
        $data = [
            "id" => $id,
            "location" => $location,
        ];
        $sql = "UPDATE users SET about = :location WHERE id = :id";
        return $this->prepare($sql)->execute($data);
    }

    // Getters
    public function getUserList()
    {
        // Returns all users as [id] => [username]
        $sql = "SELECT username, id FROM users";
        $obj = $this->prepare($sql);
        if ($obj->execute()) {
            $list = $obj->fetchAll(\PDO::FETCH_COLUMN | \PDO::FETCH_GROUP, 1);
            return array_map("reset", $list); // Does array magic to do what we want.
        } else {
            // Something went wrong. No users?
            // A disaster.
            return false;
        }
    }

    public function checkPassword(string $username, $password)
    {
        // Checks if a password matches a user's pass hash.
        $sql = "SELECT pass FROM users WHERE username = ?";
        $obj = $this->prepare($sql);
        $obj->execute([$username]);
        $hash = $obj->fetch()[0];
        return password_verify($password, $hash);
    }

    public function checkRequirements(string $username, $password, $confirm)
    {
        $status = [true, true];
        $minMax = self::common("minMax", self::USER_MIN, $username, self::USER_MAX);
        // Check Username and Password
        $status[0] = $minMax && !$this->getID($username);
        $status[1] = $minMax && $password == $confirm;
        // Finalize
        return $status;
    }

    public function getId(string $username)
    {
        // Get a user ID from a username
        $sql = "SELECT id FROM users WHERE username = ?";
        $obj = $this->prepare($sql);
        $obj->execute([$username]);
        $user = $obj->fetch(\PDO::FETCH_ASSOC);
        return $user ? reset($user) : false;
    }

    public function getUsername(int $id)
    {
        // Get a username from an ID
        $sql = "SELECT username FROM users WHERE id = ?";
        $obj = $this->prepare($sql);
        $obj->execute([$id]);
        $user = $obj->fetch(\PDO::FETCH_ASSOC);
        return $user ? reset($user) : false;
    }

    public function getImage(string $id)
    {
        // Get a user's image from an ID to a GdImage resource
        $sql = "SELECT image FROM users WHERE id = ?";
        $obj = $this->prepare($sql);
        $obj->execute([$id]);
        $image = $obj->fetch(\PDO::FETCH_ASSOC);
        return $image ? reset($image) : false;
    }

    public function getBio(string $id)
    {
        // Get a user's bio from an ID
        $sql = "SELECT about FROM users WHERE id = ?";
        $obj = $this->prepare($sql);
        $obj->execute([$id]);
        $bio = $obj->fetch(\PDO::FETCH_ASSOC);
        return $bio ? reset($bio) : false;
    }
    public function getFirstName(string $id)
    {
        // Get a user's bio from an ID
        $sql = "SELECT firstName FROM users WHERE id = ?";
        $obj = $this->prepare($sql);
        $obj->execute([$id]);
        $bio = $obj->fetch(\PDO::FETCH_ASSOC);
        return $bio ? reset($bio) : false;
    }
    public function getLastName(string $id)
    {
        // Get a user's bio from an ID
        $sql = "SELECT lastName FROM users WHERE id = ?";
        $obj = $this->prepare($sql);
        $obj->execute([$id]);
        $bio = $obj->fetch(\PDO::FETCH_ASSOC);
        return $bio ? reset($bio) : false;
    }
    public function getLocation(string $id)
    {
        // Get a user's bio from an ID
        $sql = "SELECT location FROM users WHERE id = ?";
        $obj = $this->prepare($sql);
        $obj->execute([$id]);
        $bio = $obj->fetch(\PDO::FETCH_ASSOC);
        return $bio ? reset($bio) : false;
    }
    public function getGender(string $id)
    {
        // Get a user's bio from an ID
        $sql = "SELECT gender FROM users WHERE id = ?";
        $obj = $this->prepare($sql);
        $obj->execute([$id]);
        $bio = $obj->fetch(\PDO::FETCH_ASSOC);
        return $bio ? reset($bio) : false;
    }

    // Destroyers
    public function deleteUser(int $id)
    {
        // Delete a user by ID
        $sql = "DELETE FROM users WHERE id = :id";
        $obj = $this->prepare($sql);
        return $obj->execute(["id" => $id]);
    }
}
