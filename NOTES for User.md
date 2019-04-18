READ Me first NOTES

# 1.Before Login System you need to grant Permission then then you will be login other wise not.
# 2.Check permission in using aro command.

`bin/cake acl view aro`

## Permissions using the ACL shell
Now we can set permission to group which what can see like Admin can do anything but user can have limited access.

Grant permission to all controller:  `bin/cake acl grant Groups.1 controllers`
Deny permission for all controller: `bin/cake acl deny Groups.1 controllers`
For specific controller: `bin/cake acl grant Groups.2 controllers/Posts`
For specific method: `bin/cake acl grant Groups.3 controllers/Posts/index`

# If you face any permission issue on ubuntu run below command
