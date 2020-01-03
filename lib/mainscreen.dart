import 'package:flutter/material.dart';
import 'package:my_pickup/mypost.dart';
import 'package:my_pickup/joblist.dart';
import 'package:my_pickup/myjob.dart';
import 'package:my_pickup/profile.dart';
import 'package:my_pickup/driver.dart';

class MainScreen extends StatefulWidget {
  final Driver driver;

  const MainScreen({Key key,this.driver}) : super(key: key);

  
  @override
  _MainScreenState createState() => _MainScreenState();
}

class _MainScreenState extends State<MainScreen> {
  List<Widget> tabs;

  int currentTabIndex = 0;

  @override
  void initState() {
    super.initState();
    tabs = [
      JobList(driver: widget.driver),
      MyJob(driver: widget.driver),
      MyPost(driver: widget.driver),
      Profile(driver: widget.driver),
    ];
  }
  
  String $pagetitle = "My Pickup";

  onTapped(int index) {
    setState(() {
      currentTabIndex = index;
    });
  }
  @override
  Widget build(BuildContext context) {
     
    return Scaffold(
      body: tabs[currentTabIndex],
      bottomNavigationBar: BottomNavigationBar(
        onTap: onTapped,
        currentIndex: currentTabIndex,
        //backgroundColor: Colors.blueGrey,
        type: BottomNavigationBarType.fixed,

        items: [
          
          BottomNavigationBarItem(
            icon: Icon(Icons.list, ),
            title: Text("Job List"),
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.event, ),
            title: Text("My Job"),
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.event, ),
            title: Text("My Post"),
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.person ),
            title: Text("Profile"),
          ),
        ],
      ),
      );
  }
  }
