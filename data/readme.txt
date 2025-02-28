This is how to interact with my makeshift database.
I know its horrible. Get over it. I am not using SQL.


## LAYOUT

Here is the current list of databases. I dont need many


    Database Name | URL         | Info 
    ------------------------------------------------------------------------------
    USERS         | db_users    | Stores information about individual users
    STATS         | db_stats    | Holds statistics sitewide. No identifiable 
                    |             | user information. 


All of the users information is stored in db_users.
Very little information is in any other databse.


## BASIC FUNCTIONS NEED TO KNOW

read(FILENAME) --STRING-- returns the files contents
write(FILENAME,DATA) --INT--  returns 0 after writing the contents to that file
isEmpty(FILENAME) --BOOL-- returns if the file is empty

## ACCOUNT FUNCTIONS

userPathTo(USERNAME) --STRING-- returns the directory of the users data
userExists(USERNAME) --BOOL-- returns if the user exists by looking for its password file.
userAuth(USERNAME,PASSWORD) --BOOL-- returns if the password is the users password
userCreate(USERNAME,PASSWORD) --INT-- returns 0 after creating the users data.
userDelete(USERNAME) --INT-- returns 0 after resetting password to random ints and marking it as deleted.
userSessionInit(USERNAME,ID) --INT-- returns 0 after assigning the user.session file to the id.
userSessionClear(USERNAME) --INT-- returns 0 after deleting the session file
userSessionGet(USERNAME) --STRING-- returns the users current session. If none are found, -1 is returned.
userChangePassword(USERNAME,PASSWORD) --INT-- returns 0 after changing the users password to the new one (the second arg). 

## POUCH FUNCTIONS

pouchInit(USERNAME,DAY) --INT-- returns 0 after creating the directory for the day
pouchExists(USERNAME,DAY) --BOOL-- returns true if there is a database for a given date.
pouchAdd(USERNAME,DAY,STRENGTH) --INT-- returns 0 after adding a pouch and its strength to the database.
pouchGetMgs(USERNAME,DAY) --STRING-- returns total number of mgs for that day.
pouchGetPouches(USERNAME,DAY) --STRING-- returns the total number of pouches for that day.
pouchGetHistoryString(USERNAME) --STRING-- returns all dates as a string with a space between each.
pouchGetHistoryArray(USERNAME) --ARRAY-- returns an array of all the dates in a users db.